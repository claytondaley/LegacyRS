<?php
/**
 * Copyright (C) 2014 Clayton Daley III
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace LegacyRS\Controller;

use Zend\Http\Request;
use Zend\Http\PhpEnvironment\Response;
use Zend\Http\Response\Stream;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use DaleyPiwik\Contract\ServerSideAnalyticsUserInterface;
use DaleyPiwik\Contract\ServerSideAnalyticsUserTrait;

class LegacyRSController extends AbstractActionController
    implements ServerSideAnalyticsUserInterface, ServiceLocatorAwareInterface
{
    /**
     * Default implementation for ServerAnalyticsUser interface
     */
    use ServerSideAnalyticsUserTrait;

    # Flag to prevent exit() operation from running during regular shutdown
    public $cleanShutdown = false;

    /**
     * Standard action used to load a legacy page.
     *
     * @return \Zend\Stdlib\ResponseInterface
     */
    public function legacyAction()
    {
        /** @var Response $response */
        $response = $this->getResponse();
        /** @var Request $request */
        $request  = $this->getRequest();

        # Get page
        $page = ltrim( $request->getUri()->getPath(), '/' );
        # Defaulting to index.php
        if(!$page) {
            $page = 'index.php';
        }
        # Attach full path structure (ZF2 defaults to application root)
        $page = getcwd() . '/vendor/resourcespace/resourcespace/' . $page;

        if (file_exists($page)) {
            # Get body of output
            $extension = strtolower(end(explode('.', $page)));
            if ($extension == 'php'){
                # Set correct mimetype
                $response
                    ->getHeaders()
                    ->addHeaderLine('Content-Type', $this->mimeContentType($page));

                # If a token is present, put it in the database
                # Otherwise, redirect to logout (login will reestablish cookie)
                $this->storeLoginCookie($request->getCookie()->user);

                $output = $this->runScript($page);

                # Track pages
                $this->doTracking($output);
                $response->setContent($output);
            } else {
                # Stream is the preferred way to handle files so we switch to it
                /** @var Stream $response */
                $response = new Stream();
                # Set correct mimetype
                $response
                    ->getHeaders()
                    ->addHeaderLine('Content-Type', $this->mimeContentType($page));

                # Downloads don't actually get here, are tracked through download.php page
                $response->setStream(fopen($page,'r'));
            }

            $this->cleanShutdown = true;
            return $response;
        } else {
            $response->setStatusCode(Response::STATUS_CODE_404);
            $this->cleanShutdown = true;
            return $response;
        }
    }

    /**
     * By this point, we assume that ZfcUser has done its job to authenticate the user.  This function exposes that
     * logged-in state to the legacy system by placing the value of the `user` cookie inside the database.
     */
    private function storeLoginCookie($token)
    {
        # persisting is slow so only do it if the tokens don't match
        if ($this->zfcUserAuthentication()->getIdentity()->getSession() != $token) {
            # store token in datatbase
            $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
            $user = $objectManager->find('LegacyRS\Entity\User', $this->zfcUserAuthentication()->getIdentity()->getId());
            $user->setSession($token);
            $objectManager->persist($user);
            $objectManager->flush();
        }
    }

    /**
     * This function isolates the (increasingly complex) code that runs the external script.
     *
     * @param $fileName
     * @return string
     */
    private function runScript($fileName)
    {
        # Includes break if we don't fix in the current directory to the directory of this file
        $last_slash = strrpos($fileName, '/');
        $new_dir = substr($fileName, 0, $last_slash);
        chdir($new_dir);

        $_SERVER["PHP_SELF"] = $_SERVER["REDIRECT_SCRIPT_URL"];

        /**
         * In a normal procedural codebase, the calling namespace is the global namespace.  Because we're going to
         * include the file in a function, these variables will end up with the function namespace instead. To ensure
         * calls to global variables find the correct variables, we need to link these variables to the global
         * namespace. If a variable is never referenced using the global namespace, then it should be fine if it's only
         * ever available in (and accessed from) the function namespace.
         *
         * The right list of variables can be found using a regex like:
         *
         *     global\s+\$[^;]+;
         *
         * Depending on the strategy used to find these instances, it may be necessary to trim extra text before and
         * after the global variables.
         */
        # As of @5352
        global $access,$action_dates_deletefield,$action_dates_email_admin_days,$action_dates_reallydelete,$action_dates_restrictfield,$add_contactsheet_logo,$additional_archive_states,$advanced_search_archive_select,$afp_server_path,$ajax,$align,$allow,$allow_share,$allow_smart_collections,$alt_thm,$alternative,$alternative_file_previews,$altfiles,$always_email_copy_admin,$always_email_from_user,$always_record_resource_creator,$annotate_ext_exclude,$annotate_font,$annotate_pdf_output,$annotate_pdf_output_only_annotated,$annotate_public_view,$annotate_rt_exclude,$anonymous_login,$antiword_path,$api_scramble_key,$applicationname,$archive,$archiver,$archiver_executable,$archiver_listfile_argument,$archiver_path,$auto_approve_accounts,$auto_approve_domains,$auto_order_checkbox,$autocomplete_search,$autocomplete_search_items,$autocomplete_search_min_hitcount,$available_sizes,$available_themes,$banned_extensions,$baseurl,$baseurl_short,$blank_date_upload_template,$blank_edit_template,$blender_path,$bottomx,$bottomy,$bullet,$calibre_extensions,$calibre_path,$camera_autorotation,$camera_autorotation_ext,$camera_autorotation_gm,$category_tree_open,$category_tree_search_use_and,$category_tree_show_status_window,$cattreefields_cache,$cellsize,$checkbox_and,$checkbox_ordered_vertically,$checkmail_users,$children,$ckeditor_content_toolbars,$ckeditor_toolbars,$code,$collapsible_sections,$collection,$collection_add,$collection_allow_not_approved_share,$collection_column,$collection_download,$collection_download_settings,$collection_prefix,$collection_purge,$collection_share_warning,$collectiondata,$collections,$collections_compact_style,$collections_omit_archived,$column,$columns,$comments_email_notification_address,$comments_flat_view,$comments_max_characters,$comments_show_anonymous_email_address,$config_disable_nohelp_warning,$config_search_for_number,$config_separators,$config_sheetsingle_fields,$config_sheetsingle_include_ref,$config_sheetthumb_fields,$config_sheetthumb_include_ref,$config_show_performance_footer,$config_trimchars,$config_windows,$contact_sheet,$contact_sheet_add_link,$contact_sheet_custom_footerhtml,$contact_sheet_font,$contact_sheet_logo,$contact_sheet_logo_resize,$contact_sheet_preview_size,$contactsheet_header,$count,$counter,$country_search,$cr2_thumb_extract,$cropper_allowed_extensions,$cropper_enable_batch,$cropper_transform_original,$csf,$css_reload_key,$ctrls_to_save,$curpage,$currency_symbol,$current_message,$current_user_collection_blacklisted_no_perms,$currentx,$currenty,$custom,$custom_access,$custom_registration_fields,$custom_registration_required,$custom_request_fields,$custom_request_required,$date,$date_field,$datefieldinfo_cache,$daterange_search,$db,$debug_log,$debug_log_location,$default_group,$default_icc_file,$default_perpage_list,$default_resource_type,$default_user_select,$defaultlanguage,$defaulttheme,$deltay,$df,$direct_download,$direct_link_previews_filestore,$disable_daily_stat,$disable_geocoding,$disable_quoted_printable_enc,$discount_applied,$discount_error,$disksize,$display,$dng_thumb_extract,$done,$download_multisize,$dryrun,$dump_gnash_path,$dUseCIEColor,$edit_access,$edit_autosave,$email_errors,$email_errors_address,$email_footer,$email_from,$email_multi_collections ,$email_notify,$email_url_remind_user,$email_url_save_user,$embeddocument_resourcetype,$embedslideshow_max_size,$embedslideshow_min_size,$embedvideo_resourcetype,$emulate_plugins_set,$enable_theme_category_edit,$enable_theme_category_sharing,$enable_thumbnail_creation_on_upload,$errorfields,$errors,$exif_comment,$exif_date,$exif_model,$exiftool_no_process,$exiftool_path,$exiftool_remove_existing,$exiftool_resolution_calc,$exiftool_write,$exiftool_write_omit_utf8_conversion,$ext,$extra,$extracted_text_field,$extralines,$feedback_email_required,$feedback_prompt_text,$feedback_questions,$feedback_resource_select,$ffmpeg_alternatives,$ffmpeg_audio_extensions,$ffmpeg_audio_params,$ffmpeg_fullpath,$ffmpeg_get_par,$ffmpeg_global_options,$ffmpeg_path,$ffmpeg_preview,$ffmpeg_preview_async,$ffmpeg_preview_extension,$ffmpeg_preview_force,$ffmpeg_preview_max_height,$ffmpeg_preview_max_width,$ffmpeg_preview_min_height,$ffmpeg_preview_min_width,$ffmpeg_preview_options,$ffmpeg_preview_seconds,$ffmpeg_snapshot_fraction,$ffmpeg_snapshot_seconds,$ffmpeg_supported_extensions,$fieldcount,$fieldinfo_cache,$fields,$fields_embeddedequiv,$fields_title,$fields_type,$file_checksums,$file_checksums_50k,$file_checksums_offline,$file_minimum_age,$filename,$filename_field,$filter_keywords,$filter_pos,$filterbox_instant_update,$find,$flag_new_themes,$flickr_api_key,$flickr_api_secret,$flickr_caption_field,$flickr_keywords_field,$flickr_prefix_id_title,$flickr_token,$footerspace,$format_chooser_default_output_format,$format_chooser_input_formats,$format_chooser_output_formats,$g,$g_pcl_error_code,$g_pcl_error_string,$g_pcl_trace_entries,$g_pcl_trace_filename,$g_pcl_trace_index,$g_pcl_trace_level,$g_pcl_trace_mode,$g_pcl_trace_name,$geo_search_restrict,$get_resource_data_cache,$get_resource_path_fpcache,$getfields,$getthemes,$ghostscript_executable,$ghostscript_path,$global_cookies,$grant_edit_groups,$grant_editusers,$hashsql,$headerinsert,$headline,$hidden_fields_cache,$highlightkeywords,$homeanim_folder,$hook_cache,$hook_cache_hits,$HTTP_ENV_VARS,$HTTP_SERVER_VARS,$hue,$icc_extraction,$icc_preview_options,$icc_preview_profile,$id,$image_alternatives,$image_text_default_text,$image_text_field_select,$image_text_filetypes,$image_text_override_groups,$image_text_restypes,$imageheight,$imagemagick_calculate_sizes,$imagemagick_colorspace,$imagemagick_path,$imagemagick_preserve_profiles,$imagemagick_quality,$imagesize,$imagestream_restypes,$imagestream_transitiontime,$imagewidth,$imap,$imgpath,$imperial_measurements,$imversion,$index_collection_creator,$index_collection_titles,$index_contributed_by,$inside_plugin,$ip,$ip_forwarded_for,$ip_restrict,$iptc_expectedchars,$is_search,$is_template,$items,$jfrompage,$jpage,$jtopage,$jumpcount,$jupload_alternative_upload_location,$k,$keep_for_hpr,$keyword_relationships_one_way,$lang,$language,$languages,$last_xml,$lastlevelchange,$lastrt,$lastsync,$ldapauth,$leading,$legacy_plugins,$link,$logospace,$logowidth,$m,$magictouch_account_id,$magictouch_ext_exclude,$magictouch_preview_page_sizes,$magictouch_rt_exclude,$magictouch_secure,$magictouch_view_page_sizes,$max,$max_results,$metadata_template_resource_type,$metadata_template_title_field,$mime_type_by_extension,$minyear,$modtimes,$multilingual_text_fields,$multiple,$mysql_charset,$mysql_db,$mysql_force_strict_mode,$mysql_password,$mysql_server,$mysql_username,$mysql_verbatim_queries,$n,$name,$nef_thumb_extract,$newcustom,$newhelp,$newpath,$no_preview_extensions,$noadd,$nogo,$notify_user_contributed_submitted,$notify_user_contributed_unsubmitted,$offset,$open_access_for_contributor,$optionlists,$order,$order_by,$orfields_cache,$orientation,$orig_order,$original_fields,$p,$page,$pageheight,$pagename,$pager_dropdown,$pagetime_start,$pagewidth,$parameters_string,$partial_index_min_word_length,$password,$password_brute_force_delay,$password_hash,$password_min_alpha,$password_min_length,$password_min_numeric,$password_min_special,$password_min_uppercase,$path,$path_orig,$pdf,$pdf_dynamic_rip,$pdf_pages,$pdf_split_pages_to_resources,$pdftotext_path,$pending_review_visible_to_all,$pending_submission_searchable_to_all,$per_page,$perform_filter,$permissions,$permissions_done,$pextension,$photoshop_eps_miff,$photoshop_thumb_extract,$php_path,$plugins,$plupload_upload_location,$portrait_landscape_field,$preview_all,$preview_extension,$preview_generate_max_file_size,$previewbased,$previewpage,$pricing,$process_locks_max_seconds,$progress_file,$psd_transparency_checkerboard,$public_collections_confine_group,$purchase_pipeline_price,$qlpreview_exclude_extensions,$qlpreview_path,$qtfaststart_extensions,$qtfaststart_path,$querycount,$querylog,$querytime,$quicksearch,$raf_thumb_extract,$randomised_session_hash,$ref,$refnumberfontsize,$regex_email,$registration_group_select,$related_keywords_cache,$related_search_show_self,$remotedownload_addquery,$remotedownload_append,$remotedownload_prepend,$remotedownload_replace,$request_senduserupdates,$required_fields_exempt,$res_skipped,$reset_date_field,$reset_date_upload_template,$resource,$resource_created_by_filter,$resource_data,$resource_deletion_state,$resource_field_column_limit,$resource_hit_count_on_downloads,$resource_type,$resource_type_request_emails,$resourceconnect_affiliates,$resourceconnect_link_name,$resourceconnect_selected,$resourceconnect_this,$resourceconnect_treat_local_system_as_affiliate,$resourceconnect_user,$restricted_full_download,$restypes,$result,$results_title_trim,$results_title_wordwrap,$revsort,$rotd_discount,$rotd_field,$rowsperpage,$rss_ttl,$rw2_thumb_extract,$sat,$save_as,$scramble_key,$scriptconditions,$search,$search_all_workflow_states,$search_filter_strict,$search_includes_public_collections,$search_includes_themes,$search_includes_user_collections,$search_public_collections_ref,$search_sql_double_pass_mode,$select,$session_hash,$sheetstyle,$show_edit_all_link,$show_error_messages,$show_expiry_warning,$show_report_bug_link,$show_theme_collection_stats,$showprice,$site_text,$size,$smart_collections_async,$smart_themes_omit_archived,$smartsearch,$smartsearch_ref_cache,$smtp_auth,$smtp_host,$smtp_password,$smtp_port,$smtp_secure,$smtp_username,$sort,$spacew,$sql,$sql_filter,$sql_join,$starsearch,$staticsync_alt_suffix_array,$staticsync_alt_suffixes,$staticsync_alternatives_suffix,$staticsync_autotheme,$staticsync_extension_mapping,$staticsync_extension_mapping_default,$staticsync_folder_structure,$staticsync_ingest,$staticsync_mapfolders,$staticsync_mapped_category_tree,$staticsync_prefer_embedded_title,$staticsync_run_timestamp,$staticsync_title_includes_path,$staticSyncDirs,$staticSyncSyncDirField,$staticSyncUseArray,$status,$storagedir,$storageurl,$subsetting,$syncdir,$system_login,$tabcount,$tabname,$tabs_on_edit,$target,$targetDir,$tempdir,$templatevars,$temptable_counter,$theme_category_levels,$theme_direct_jump,$theme_images,$theme_images_align_right,$theme_images_number,$themename,$themes_category_split_pages,$themes_category_split_pages_parents,$themes_category_split_pages_parents_root_node,$themes_column_sorting,$themes_date_column,$themes_in_my_collections,$themes_ref_column,$themes_single_collection_shortcut,$thumbsize,$title_field,$titlefontsize,$tmpfile,$top_nav_upload_type,$topx,$topy,$totalpages,$transparency_background,$tree,$tweak_all_images,$U_perm_strict,$udata_cache,$uniqid,$unoconv_extensions,$unoconv_path,$uploader_view_override,$url,$use,$use_mysqli,$use_phpmailer,$use_plugins_manager,$use_refine_searchstring,$use_smtp,$use_temp_tables,$use_temp_tables_for_keyword_joins,$use_watermark,$use_zip_extension,$user,$user_account_auto_creation_usergroup,$user_email,$user_rating_only_once,$user_rating_remove,$user_resources_approved_email,$user_select_sql,$usercollection,$usereditfilter,$useremail,$userfixedtheme,$userfullname,$usergroup,$usergroupparent,$username,$userpassword,$userpermissions,$userref,$userrequestmode,$userresourcedefaults,$usersearchfilter,$values,$video_category,$video_description,$video_keywords,$video_title,$videosplice_parent_field,$videosplice_resourcetype,$videotypes,$view_title_field,$viewInFinder,$w_diff,$watermark,$width,$wildcard_always_applied,$wildcard_expand_limit,$x,$x_diff,$xml,$xml_metadump,$xml_metadump_dc_map,$youtube_publish_allow_multiple,$youtube_publish_callback_url,$youtube_publish_client_id,$youtube_publish_client_secret,$youtube_publish_developer_key,$youtube_publish_restypes,$youtube_publish_url_field,$youtube_video_url,$zip_contents_field,$zip_contents_field_crop,$zipcommand;
        # As of @6513 (v7.1)
        global $allfields,$allow_custom_access_share,$allow_password_email,$always_make_previews,$amended_filename,$api,$api_search_exclude_fields,$api_search_full_field_data,$auth_url,$auto_order_checkbox_case_insensitive,$autorotate_ingest,$autorotate_no_ingest,$browser_language,$checkbox_vertical_columns,$cinfo,$collection_commenting,$collection_dropdown_user_access_mode,$collection_share_expire_days,$collection_share_expire_never,$collections_compact_style_ajax,$colresult,$config_sheetlist_fields,$customContents,$customgroupaccess,$customuseraccess,$data_joins,$date_d_m_y,$default_customaccess,$default_display,$default_sort,$descthemesorder,$direct_link_previews,$disable_languages,$display_useredit_ref,$download_usage,$editaccess,$email_multi_collections,$embedded_data_user_select,$embedded_data_user_select_fields,$embedslideshow_resourcedatatextfield,$embedslideshow_textfield,$enable_related_resources,$enable_remote_apis,$errorEmail,$errorFullname,$errorUsername,$feedback,$ffmpeg_no_new_snapshots,$field_order_by,$field_sort,$field_types,$filter_by_parent,$filter_by_permissions,$filterbox_wildcard,$flickr_frob,$flickr_nice_progress,$flickr_scale_up,$format_chooser_profiles,$found_meta_append_field_ref,$group,$hidden_collections,$hide_restricted_download_sizes,$ignore_collection_access,$image_text_banner_position,$image_text_font,$image_text_height_proportion,$image_text_max_height,$image_text_min_height,$image_text_position,$keywords_remove_diacritics,$lean_preview_generation,$list_display_fields,$manage_request_admin,$max_login_attempts_per_ip,$max_login_attempts_per_username,$max_login_attempts_wait_minutes,$merge_filename_with_title,$merge_filename_with_title_default,$meta_append_date_format,$meta_append_field_ref,$meta_append_prompt,$nav2contact_link,$nextpage,$normalize_keywords,$notify_on_resource_change_days,$original,$password_reset_mode,$pdf_resolution,$previouspage,$propose_changes_allow_open,$propose_changes_always_allow,$proposed_changes,$quoted_string,$rating_field,$relate_on_upload,$related_resource_preview_size,$related_type_show_with_data,$related_type_upload_link,$request_adds_to_collection,$resource_type_array,$resource_type_config_override_last,$resource_type_config_override_snapshot,$resource_types,$resources,$resourcetoolsGT,$restricted_share,$restype_order_by,$restype_sort,$restypefilter,$rt_fieldtype_cache,$save_errors,$send_collection_to_admin,$show_error,$showkeypreview,$size_info_array,$sizes,$slideshow_photo_delay,$small_thumbs_display_fields,$sort_fields,$stemming,$store_uploadedrefs,$swap_clear_and_search_buttons,$theme,$themes_with_resources_only,$thumbs,$thumbs_display_fields,$track_fields,$unnormalized_index,$url_params,$user_account_fullname_create,$user_preferences_change_email,$user_preferences_change_name,$user_preferences_change_username,$userdata,$userderestrictfilter,$usergroupemails,$usesize,$value,$view_default_dpi,$watermark_open,$xl_thumbs_display_fields;

        # To permit processing by modules in teh ZF2 wrapper, we want to capture output using ob_
        #  - Known holes in this strategy are exit() and die() which close all parent scripts

        # Make sure we get back to the right ob_ level in case legacy file depends on script end to clear ob
        $ob_level = ob_get_level();

        # Store ob output using a method variable and a callback
        # This addresses a case where the legacy file uses chunking and returns data too quickly to this level
        $ob_output = "";
        ob_start(function($st) use (&$ob_output) {
            $ob_output .= $st;
            return "";
            }
        );

        # Support tracking in the case that a script uses exit()
        $controller = $this;
        register_shutdown_function(function() use ($controller, &$ob_output, $ob_level) {
            if (!$controller->cleanShutdown) {
                # To address a case where the legacy application leaves an ob_start open
                while (ob_get_level() > $ob_level) {
                    ob_end_flush();
                }

                $controller->doTracking($ob_output);

                # Dump everything in the output buffer to the client (file downloads)
                $response = $controller->getResponse();
                $response->setContent($ob_output);
                $response->send();
            }
        })  ;

        # Send in configuration
        $legacyrs_config = $this->getServiceLocator()->get('config')['LegacyRS']['config'];

        # Load legacy script
        include $fileName;

        # To address a case where the legacy application leaves an ob_start open
        while (ob_get_level() > $ob_level) {
            ob_end_flush();
        }

        return $ob_output;
    }

    /**
     * doTracking is the (legacy) site-specific logic to determine when tracking should occur
     * and what _types_ of tracking should occur.
     *
     * @param $output
     */
    function doTracking($output = null) {
        /** @var $request \Zend\Http\Request */
        $request = $this->getRequest();
        $url = ltrim( $request->getUri()->getPath(), '/' );
        # $segments = preg_split( "(/|\\.|?|&|#)", $url );

        # Get page title from $output
        $title = null;
        if ($output) {
            $ajax = $request->getQuery('ajax');
            if ($ajax == "true") {
                $title = $this->ajaxTitle($output);
            } else {
                $title = $this->pageTitle($output);
            };
        }
        # Provide url to tracking engines if title is unavailable
        if (!$title) {
            $title = $request->getUri()->getPath();
        }

        # Skip calls to ajax only pages
        if (substr($url, 0, 10) == "pages/ajax")
            return;

        # Skip calls to update collections bar
        if (substr($url, 0, 21) == "pages/collections.php")
            return;

        # ResourceSpace uses search.php for most searches
        if (substr($url, 0, 16) == "pages/search.php") {
            # Must check *both* post and query because RS uses both GET and POST to submit searches
            $keyword = "";
            $category = "";

            # Must check post to figure out which search is being used since other keywords (like &ajax) can end up
            # in the query string.
            $search = $request->getPost()->toArray();
            if (empty($search)) {
                $search = $request->getQuery()->toArray();
                /* get looks like:
                 *
                 * search=!listid,+month:04,+day:04,+cap,+table,+title:title,+keywords:keyword,+caption:description,
                 *     +person:named,+person:person,+originalfilename:filename,+text:extracted
                 * &archive=-1
                 */
                if (isset($search['search'])) {
                    $keyword .= $search['search'];
                }
                if (isset($search['archive'])) {
                    if ($keyword) {
                        $keyword .= ",";
                    }
                    $keyword .= "+state:" . $search['archive'];
                }
                /*
                 *  The advanced search uses cookies to store resource types:
                 *
                 *  [search] => key, words
                 *  [advancedsearchsection] => ,9,2,8  # can't get anything but restypes to populate
                 *  [restypes] => 2,8,9
                 */
                $cookies = $request->getCookie()->getArrayCopy();
                if (isset($cookies['restypes']) and $cookies['restypes']) {
                    $category = $cookies['restypes'];
                } else {
                    $category = "all";
                }
            } else {
                /*
                 * Array (
                 * 	[search] => cap, table
                 * 	[resetrestypes] => yes
                 *  // never has a "no" value, any items not searched are left out
                 * 	[rttickallres] => on
                 * 	[resource2] => yes
                 * 	[resource8] => yes
                 * 	[resource1] => yes
                 * 	[resource3] => yes
                 * 	[resource4] => yes
                 * 	[resource9] => yes
                 * 	[resource6] => yes
                 * 	[resource7] => yes
                 * 	[resource5] => yes
                 *  // always present but may be empty
                 * 	[year] => 2011
                 * 	[month] => 02
                 */
                if (isset($search['search'])) {
                    $keyword .= $search['search'];
                    # stanadardize syntax to match advanced search
                    preg_replace ('/\s*,\s*/siU',',+',$keyword);
                    # RS treats spaces as commas in the quicksearch that is submitted as a POST (form)
                    preg_replace ('/\s+/siU',',+',$keyword);
                }
                # Year is stored in separate key, but can/should be treated
                if (isset($search['year']) and $search['year']) {
                    if ($keyword) {
                        $keyword .= ",";
                    }
                    $keyword .= "+year:" . $search['year'];
                }
                if (isset($search['month']) and $search['month']) {
                    if ($keyword) {
                        $keyword .= ",";
                    }
                    $keyword .= "+month:" . $search['month'];
                }
                if (isset($search['rttickallres'])) {
                    $category .= "all";
                } else {
                    foreach (array_keys($search) as $key) {
                        # If the keyword is a resource, add its number to category list
                        if (substr($key, 0, 8) == 'resource') {
                            if ($category) {
                                $category .= ",";
                            }
                            $category .= substr($key,8);
                        }
                    }
                }
            }

            # Get resource count
            if (preg_match("/<span\\ class=\"Selected\">\\s*([0-9]*)\\s*<\\/span>(results|resources)<\\/div>/siU", $output, $matches)) {
                $countResults = $matches[1];
            } else {
                $countResults = 0;
            }

            $this->trackSiteSearch($keyword, $category, $countResults);
            return;
        }

        # LegacyRS uses download.php to deliver files
        if (substr($url, 0, 18) == "pages/download.php") {
            $actionUrl = $request->getUriString();
            $this->trackDownload($actionUrl);
            return;
        }

        # Track as page view by default
        $this->trackPageView($title);
    }

    function ajaxTitle($contents) {
        if (!$contents)
            return null;

        # preg_match for ajax document.title call
        $result = preg_match("/document\\.title\\ =\\ \"(.*)\";/siU", $contents, $title_matches);
        if (!$result)
            return null;

        # Clean up excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }

    function pageTitle($contents) {
        if (!$contents)
            return null;

        # preg_match for <title> tags
        $result = preg_match("/<title>(.*)<\\/title>/siU", $contents, $title_matches);
        if (!$result)
            return null;

        # Clean up excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }

    /* The following function used under PHP License from
     * http://php.net/manual/en/function.mime-content-type.php#87856
     */
    private function mimeContentType($filename)
    {
        // our list of mime types
        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.', $filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        } elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        } else {
            return 'application/octet-stream';
        }
    }
}