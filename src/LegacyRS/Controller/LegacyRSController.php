<?php
/*
Copyright (C) 2014 Clayton Daley III

This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

namespace LegacyRS\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class LegacyRSController extends AbstractActionController
{

    public function indexAction()
    {
        $request  = $this->getRequest();
        $response = $this->getResponse();

        # Get page
        $page = ltrim( $request->getUri()->getPath(), '/' );
        # Defaulting to index.php
        if(!$page) {
            $page = 'index.php';
        }
        # Attach full path structure (ZF2 defaults to application root)
        $page = getcwd() . '/module/LegacyRS/legacy/' . $page;

        if (file_exists($page)) {
            # Set corect mimetype
            $response
                ->getHeaders()
                ->addHeaderLine('Content-Type', $this->mime_content_type($page));

            # Get body of output
            $extension = strtolower(end(explode('.', $page)));
            if ($extension == 'php'){
                $output = $this->runScript($page);
            } else {
                $output =  file_get_contents($page);
            }
            $response->setContent($output);
            return $response;
        } else {
            $response->setContent("404<br>for page:  $request->getUri()->getPath()");
            return $response;
        }
    }

    private function runScript($fileName)
    {
        # Includes break if we don't fix in the current directory to the directory of this file
        $last_slash = strrpos($fileName, '/');
        $new_dir = substr($fileName, 0, $last_slash);
        chdir($new_dir);

        $_SERVER["PHP_SELF"] = $_SERVER["REDIRECT_SCRIPT_URL"];

        global $about_link,$access,$action_dates_deletefield,$action_dates_email_admin_days,$action_dates_reallydelete,$action_dates_restrictfield,$active_collections,$add_contactsheet_logo,$additional_archive_states,$admin_header_height,$advanced_search_archive_select,$advanced_search_buttons_top,$advanced_search_nav,$advancedsearch_disabled,$afp_server_path,$ajax,$ajax_loading_timer,$align,$allow,$allow_account_request,$allow_keep_logged_in,$allow_metadata_revert,$allow_password_change,$allow_password_reset,$allow_resource_deletion,$allow_save_search,$allow_share,$allow_smart_collections,$alt_thm,$alt_types,$alt_types_organize,$alternative,$alternative_file_previews,$alternative_file_previews_batch,$alternative_file_previews_mouseover,$alternative_file_resource_preview,$alternative_file_resource_title,$altfiles,$always_email_copy_admin,$always_email_from_user,$always_make_previews,$always_record_resource_creator,$amended_filename,$annotate_ext_exclude,$annotate_font,$annotate_pdf_output,$annotate_pdf_output_only_annotated,$annotate_public_view,$annotate_rt_exclude,$anonymous_login,$antiword_path,$api,$api_scramble_key,$api_search_exclude_fields,$applicationdesc,$applicationname,$archive,$archive_search,$archiver,$archiver_executable,$archiver_listfile_argument,$archiver_path,$auto_approve_accounts,$auto_approve_domains,$auto_order_checkbox,$autocomplete_search,$autocomplete_search_items,$autocomplete_search_min_hitcount,$autorotate_no_ingest,$autoshow_thumbs,$available_sizes,$available_themes,$available_themes_by_default,$back_to_collections_link,$banned_extensions,$baseurl,$baseurl_short,$basic_simple_search,$basket_stores_size,$blank_date_upload_template,$blank_edit_template,$blender_path,$bottomx,$bottomy,$bullet,$bypass_share_screen,$calibre_extensions,$calibre_path,$camera_autorotation,$camera_autorotation_checked,$camera_autorotation_ext,$camera_autorotation_gm,$cat_tree_singlebranch,$category_tree_open,$category_tree_search_use_and,$category_tree_show_status_window,$cattreefields_cache,$cc_me,$cellsize,$checkbox_and,$checkbox_ordered_vertically,$checkbox_vertical_columns,$checkmail_users,$children,$cinfo,$ckeditor_content_toolbars,$ckeditor_toolbars,$code,$collapsible_sections,$collection,$collection_add,$collection_allow_creation,$collection_allow_empty_share,$collection_allow_not_approved_share,$collection_bar_popout,$collection_column,$collection_commenting,$collection_download,$collection_download_settings,$collection_dropdown_user_access_mode,$collection_feedback_display_field,$collection_frame_divider_height,$collection_frame_height,$collection_prefix,$collection_public_hide_owner,$collection_purge,$collection_reorder_caption,$collection_share_warning,$collectiondata,$collections,$collections_compact_style,$collections_compact_style_ajax,$collections_delete_empty,$collections_footer,$collections_omit_archived,$colour_sort,$colresult,$column,$columns,$columns_select,$comments_collection_enable,$comments_email_notification_address,$comments_flat_view,$comments_max_characters,$comments_policy_external_url,$comments_resource_enable,$comments_responses_max_level,$comments_show_anonymous_email_address,$config_disable_nohelp_warning,$config_search_for_number,$config_separators,$config_sheetlist_fields,$config_sheetlist_include_ref,$config_sheetsingle_fields,$config_sheetsingle_include_ref,$config_sheetthumb_fields,$config_sheetthumb_include_ref,$config_show_performance_footer,$config_trimchars,$config_windows,$contact_link,$contact_sheet,$contact_sheet_add_link,$contact_sheet_add_link_option,$contact_sheet_custom_footerhtml,$contact_sheet_font,$contact_sheet_include_header,$contact_sheet_include_header_option,$contact_sheet_logo,$contact_sheet_logo_option,$contact_sheet_logo_resize,$contact_sheet_preview_size,$contact_sheet_previews,$contact_sheet_resource,$contact_sheet_single_select_size,$contact_sheet_unicode_filenames,$contactsheet_header,$contactsheet_sorting,$count,$counter,$country_search,$country_sort,$cr2_thumb_extract,$cropper_allowed_extensions,$cropper_enable_batch,$cropper_transform_original,$csf,$css_reload_key,$ctrls_to_save,$curpage,$currency_symbol,$current_message,$current_user_collection_blacklisted_no_perms,$currentx,$currenty,$custom,$custom_access,$custom_home_panels,$custom_registration_fields,$custom_registration_html,$custom_registration_options,$custom_registration_required,$custom_registration_types,$custom_request_fields,$custom_request_html,$custom_request_options,$custom_request_required,$custom_request_types,$custom_stylesheet_external_share,$custom_stylesheet_external_share_path,$custom_top_nav,$data_joins,$date,$date_column,$date_field,$datefieldinfo_cache,$daterange_search,$db,$debug_direct_download,$debug_log,$debug_log_location,$default_advanced_search_mode,$default_display,$default_group,$default_home_page,$default_icc_file,$default_perpage,$default_perpage_list,$default_res_types,$default_resource_type,$default_sort,$default_user_select,$defaultlanguage,$defaulttheme,$delete_requires_password,$deltay,$df,$direct_download,$direct_download_allow_ie7,$direct_download_allow_ie8,$direct_download_allow_opera,$direct_download_noauth,$direct_link_previews,$direct_link_previews_filestore,$disable_alternative_files,$disable_collection_toggle,$disable_daily_stat,$disable_geocoding,$disable_languages,$disable_quoted_printable_enc,$disable_searchresults,$disable_upload_preview,$discount_applied,$discount_error,$disksize,$display,$display_field_below_preview,$display_request_log_link,$display_resource_id_in_thumbnail,$display_search_titles,$display_selector_dropdowns,$display_swf,$display_swf_xlarge_view,$display_user_rating_stars,$display_useredit_ref,$distinguish_uploads_from_edits,$dng_thumb_extract,$do_not_add_to_new_collection_default,$done,$download_chunk_size,$download_filename_field,$download_filename_id_only,$download_multisize,$download_no_session_cache_limiter,$download_summary,$download_usage,$download_usage_options,$download_usage_prevent_options,$dryrun,$dump_gnash_path,$dUseCIEColor,$edit_access,$edit_all_checkperms,$edit_autosave,$edit_large_preview,$edit_show_save_clear_buttons_at_top,$edit_upload_options_at_top,$editaccess,$email_errors,$email_errors_address,$email_footer,$email_from,$email_from_user,$email_multi_collections,$email_notify,$email_sharing,$email_url_remind_user,$email_url_save_user,$embedded_data,$embedded_data_user_select,$embedded_data_user_select_fields,$embeddocument_resourcetype,$embedslideshow_max_size,$embedslideshow_min_size,$embedslideshow_resourcedatatextfield,$embedslideshow_textfield,$embedvideo_resourcetype,$emptycollection,$emulate_plugins_set,$enable_add_collection_on_upload,$enable_collection_copy,$enable_copy_data_from,$enable_find_similar,$enable_plugin_upload,$enable_public_collection_on_upload,$enable_public_collections,$enable_related_resources,$enable_remote_apis,$enable_theme_category_edit,$enable_theme_category_sharing,$enable_themes,$enable_thumbnail_creation_on_upload,$errorEmail,$errorfields,$errorFullname,$errors,$errorUsername,$exif_comment,$exif_date,$exif_model,$exiftool_no_process,$exiftool_path,$exiftool_remove_existing,$exiftool_resolution_calc,$exiftool_write,$exiftool_write_omit_utf8_conversion,$expiry_notification_mail,$ext,$extra,$extracted_text_field,$extralines,$f,$feedback,$feedback_email_required,$feedback_prompt_text,$feedback_questions,$feedback_resource_select,$ffmpeg_alternatives,$ffmpeg_audio_extensions,$ffmpeg_audio_params,$ffmpeg_command_prefix,$ffmpeg_fullpath,$ffmpeg_get_par,$ffmpeg_global_options,$ffmpeg_no_new_snapshots,$ffmpeg_path,$ffmpeg_preview,$ffmpeg_preview_async,$ffmpeg_preview_download_name,$ffmpeg_preview_extension,$ffmpeg_preview_for,$ffmpeg_preview_force,$ffmpeg_preview_max_height,$ffmpeg_preview_max_width,$ffmpeg_preview_min_height,$ffmpeg_preview_min_width,$ffmpeg_preview_options,$ffmpeg_preview_seconds,$ffmpeg_snapshot_fraction,$ffmpeg_snapshot_seconds,$ffmpeg_supported_extensions,$ffmpeg_use_qscale,$fieldcount,$fieldinfo_cache,$fields,$fields_embeddedequiv,$fields_title,$fields_type,$file_checksums,$file_checksums_50k,$file_checksums_offline,$filename,$filename_field,$filter_keywords,$filter_pos,$filterbox_instant_update,$find,$flag_new_themes,$flickr_api_key,$flickr_api_secret,$flickr_caption_field,$flickr_keywords_field,$flickr_prefix_id_title,$flickr_token,$flv_player_xlarge_view,$flv_preview_downloadable,$force_display_template_order_by,$format_chooser_default_output_format,$format_chooser_input_formats,$format_chooser_output_formats,$format_chooser_profiles,$ftp_defaultfolder,$ftp_password,$ftp_server,$ftp_username,$g,$g_pcl_error_code,$g_pcl_error_string,$g_pcl_trace_entries,$g_pcl_trace_filename,$g_pcl_trace_index,$g_pcl_trace_level,$g_pcl_trace_mode,$g_pcl_trace_name,$geo_layers,$geo_search_restrict,$geo_tile_caching,$geolocation_default_bounds,$get_resource_data_cache,$get_resource_path_fpcache,$getfields,$getthemes,$ghostscript_executable,$ghostscript_path,$global_cookies,$global_permissions,$grant_edit_groups,$grant_editusers,$group,$groupuploadfolders,$hashsql,$header_favicon,$header_text_title,$headerinsert,$headline,$help_link,$hidden_collections,$hidden_fields_cache,$hide_access_column,$hide_access_column_public,$hide_collection_share_generate_url,$hide_geolocation_panel,$hide_internal_sharing_url,$hide_main_simple_search,$hide_resource_share_generate_url,$hide_resource_share_link,$hide_resource_types,$hide_restricted_download_sizes,$hide_uploadertryother,$highlightkeywords,$home_advancedsearch,$home_helpadvice,$home_mycollections,$home_mycontributions,$home_slideshow_height,$home_slideshow_width,$home_themeheaders,$home_themes,$homeanim_folder,$hook_cache,$hook_cache_hits,$HTTP_ENV_VARS,$HTTP_SERVER_VARS,$hue,$icc_extraction,$icc_preview_options,$icc_preview_profile,$iconthumbs,$id,$id_column,$image_alternatives,$image_preview_zoom,$image_rotate_reverse_options,$image_text_banner_position,$image_text_default_text,$image_text_field_select,$image_text_filetypes,$image_text_font,$image_text_height_proportion,$image_text_max_height,$image_text_min_height,$image_text_override_groups,$image_text_position,$image_text_restypes,$imageheight,$imagemagick_calculate_sizes,$imagemagick_colorspace,$imagemagick_path,$imagemagick_preserve_profiles,$imagemagick_quality,$imagesize,$imagestream_restypes,$imagestream_transitiontime,$imagewidth,$imap,$imgpath,$imperial_measurements,$imversion,$include_contactsheet_logo,$include_rs_header_info,$index_collection_creator,$index_collection_titles,$index_contributed_by,$infobox,$infobox_display_resource_icon,$infobox_display_resource_id,$infobox_display_resource_type,$infobox_fields,$infobox_image_mode,$inside_plugin,$ip,$ip_forwarded_for,$ip_restrict,$iprestrict_friendlyerror,$iptc_expectedchars,$is_search,$is_template,$items,$jfrompage,$jpage,$jtopage,$jumpcount,$jupload_alternative_upload_location,$k,$keep_for_hpr,$keyboard_navigation,$keyboard_navigation_add_resource,$keyboard_navigation_all_results,$keyboard_navigation_next,$keyboard_navigation_next_page,$keyboard_navigation_pages_use_alt,$keyboard_navigation_prev,$keyboard_navigation_prev_page,$keyboard_navigation_remove_resource,$keyboard_navigation_toggle_thumbnails,$keyboard_navigation_view_all,$keyboard_navigation_zoom,$keyboard_scroll_jump,$keyword_relationships_one_way,$keywords_remove_diacritics,$lang,$language,$languages,$last_xml,$lastrt,$lastsync,$ldapauth,$leading,$legacy_plugins,$link,$list_display_array,$list_display_fields,$list_recipients,$list_search_results_title_trim,$list_view_status_column,$load_ubuntu_font,$local_ftp_upload_folder,$log_resource_views,$login_autocomplete,$logospace,$logowidth,$m,$magictouch_account_id,$magictouch_ext_exclude,$magictouch_preview_page_sizes,$magictouch_rt_exclude,$magictouch_secure,$magictouch_view_page_sizes,$manage_collections_contact_sheet_link,$manage_collections_remove_link,$manage_collections_share_link,$max,$max_collection_thumbs,$max_login_attempts_per_ip,$max_login_attempts_per_username,$max_login_attempts_wait_minutes,$max_results,$metadata_download,$metadata_read,$metadata_read_default,$metadata_report,$metadata_template_resource_type,$metadata_template_title_field,$mime_type_by_extension,$minyear,$modtimes,$mp3_player,$mp3_player_xlarge_view,$multilingual_text_fields,$multiple,$mycollections_link,$mycontributions_link,$mycontributions_userlink,$myrequests_link,$mysql_bin_path,$mysql_charset,$mysql_db,$mysql_force_strict_mode,$mysql_password,$mysql_server,$mysql_username,$mysql_verbatim_queries,$n,$name,$nav2contact_link,$nef_thumb_extract,$newcustom,$newhelp,$newpath,$no_metadata_read_default,$no_preview_extensions,$noadd,$nogo,$normalize_keywords,$notify_user_contributed_submitted,$notify_user_contributed_unsubmitted,$offset,$open_access_for_contributor,$optionlists,$order,$order_by,$order_by_resource_id,$order_by_resource_type,$orderbyrating,$orfields_cache,$orig_order,$original_download_name,$original_fields,$original_filename_sort,$original_filenames_when_downloading,$p,$pa,$page,$pageheight,$pagename,$pager_dropdown,$pagetime_start,$pagewidth,$papersize_select,$parameters_string,$partial_index_min_word_length,$password,$password_brute_force_delay,$password_expiry,$password_hash,$password_min_alpha,$password_min_length,$password_min_numeric,$password_min_special,$password_min_uppercase,$path,$path_orig,$payment_address,$payment_currency,$paypal_url,$pdf,$pdf_dynamic_rip,$pdf_pages,$pdf_resolution,$pdf_split_pages_to_resources,$pdftotext_path,$pending_review_visible_to_all,$pending_submission_searchable_to_all,$per_page,$perform_filter,$permissions,$permissions_done,$perpage_dropdown,$pextension,$photoshop_eps_miff,$photoshop_thumb_extract,$php_path,$php_time_limit,$plugins,$plupload_autostart,$plupload_chunk_size,$plupload_clearqueue,$plupload_max_file_size,$plupload_max_retries,$plupload_runtimes,$plupload_show_failed,$plupload_upload_location,$popularity_sort,$portrait_landscape_field,$prefix_filename_string,$prefix_resource_id_to_filename,$preview_all,$preview_all_default_orientation,$preview_all_hide_collections,$preview_extension,$preview_generate_max_file_size,$previewbased,$previewpage,$pricing,$process_locks_max_seconds,$progress_file,$propose_changes_always_allow,$proposed_changes,$psd_transparency_checkerboard,$public_collections_confine_group,$public_collections_exclude_themes,$public_collections_header_only,$public_collections_top_nav,$purchase_pipeline_price,$qlprevi,$qlpreview_exclude_extensions,$qlpreview_path,$qtfaststart_extensions,$qtfaststart_path,$querycount,$querylog,$querytime,$quicksearch,$quoted_string,$raf_thumb_extract,$random_sort,$randomised_session_hash,$rating_field,$recent_link,$recent_search_by_days,$recent_search_by_days_default,$recent_search_period_array,$recent_search_period_select,$recent_search_quantity,$ref,$refnumberfontsize,$regex_email,$registration_group_select,$related_keywords_cache,$related_search_show_self,$related_type_show_with_data,$related_type_upload_link,$remember_me_checked,$remotedownload_addquery,$remotedownload_append,$remotedownload_prepend,$remotedownload_replace,$remove_collections_vertical_line,$remove_usage_textbox,$removenever,$replace_file_resource_preview,$replace_file_resource_title,$reporting_periods_default,$request_adds_to_collection,$request_senduserupdates,$required_fields_exempt,$res_skipped,$research_link,$research_request,$reset_date_field,$reset_date_upload_template,$resource,$resource_contact_link,$resource_created_by_filter,$resource_data,$resource_deletion_state,$resource_field_column_limit,$resource_hit_count_on_downloads,$resource_share_filter_collections,$resource_type,$resource_type_column,$resource_type_config_override_last,$resource_type_config_override_snapshot,$resource_type_icons,$resource_type_request_emails,$resourceconnect_affiliates,$resourceconnect_link_name,$resourceconnect_selected,$resourceconnect_this,$resourceconnect_treat_local_system_as_affiliate,$resourceconnect_user,$resourceid_simple_search,$resources,$restricted_full_download,$restricted_share,$restypes,$result,$results_display_array,$results_title_trim,$results_title_wordwrap,$revsort,$rotd_discount,$rotd_field,$rowsperpage,$rss_ttl,$rt_fieldtype_cache,$rw2_thumb_extract,$sat,$save_as,$scramble_key,$scriptconditions,$search,$search_all_workflow_states,$search_filter_strict,$search_includes_public_collections,$search_includes_themes,$search_includes_user_collections,$search_public_collections_ref,$search_result_title_height,$search_results_link,$search_results_title_trim,$search_results_title_wordwrap,$search_sql_double_pass_mode,$search_titles,$search_titles_searchcrumbs,$search_titles_shortnames,$searchbar_buttons_at_bottom,$searchbar_selectall,$searchbyday,$select,$send_statistics,$separate_resource_types_in_searchbar,$server_charset,$session_autologout,$session_hash,$session_length,$share_resource_include_related,$sharing_userlists,$sheetstyle,$show_access_field,$show_access_on_upload_perm,$show_anonymous_login_panel,$show_contributed_by,$show_default_related_resources,$show_edit_all_link,$show_error_messages,$show_expiry_warning,$show_extension_in_search,$show_hitcount,$show_language_chooser,$show_related_themes,$show_report_bug_link,$show_resource_title_in_titlebar,$show_resource_type,$show_resourceid,$show_searchitemsdiskusage,$show_status_and_access_on_upload,$show_status_and_access_on_upload_perm,$show_theme_collection_stats,$show_upload_log,$show_user_contributed_resources,$showkeypreview,$showprice,$simple_search_date,$simple_search_dropdown_filtering,$simple_search_reset_after_search,$simple_search_show_dynamic_as_dropdown,$site_text,$site_text_custom_create,$site_text_use_ckeditor,$size,$size_info_array,$sizes,$small_search_result_title_height,$small_search_results_title_trim,$small_search_results_title_wordwrap,$small_thumbs_display_extended_fields,$small_thumbs_display_fields,$smallthumbs,$smart_collections_async,$smart_themes_omit_archived,$smartsearch,$smartsearch_ref_cache,$smtp_auth,$smtp_host,$smtp_password,$smtp_port,$smtp_secure,$smtp_username,$sort,$sort_fields,$sort_relations_by_filetype,$sort_relations_by_restype,$spacew,$speedtagging,$speedtagging_by_type,$speedtaggingfield,$spider_access,$spider_password,$spider_usergroup,$sql,$sql_filter,$sql_join,$sqlvariable,$star_search,$starsearch,$staticsyn,$staticsync_alt_suffix_array,$staticsync_alt_suffixes,$staticsync_alternatives_suffix,$staticsync_autotheme,$staticsync_extension_mapping,$staticsync_extension_mapping_default,$staticsync_folder_structure,$staticsync_ingest,$staticsync_mapfolders,$staticsync_mapped_category_tree,$staticsync_prefer_embedded_title,$staticsync_ti,$staticsync_title_includes_path,$staticSyncDirs,$staticSyncSyncDirField,$staticSyncUseArray,$status,$storagedir,$storageurl,$subsetting,$suggest_threshold,$swap_clear_and_search_buttons,$syncdir,$system_login,$tabcount,$tabname,$tabs_on_edit,$target,$targetDir,$team_centre_alert_icon,$team_centre_bug_report,$tempdir,$templatevars,$temptable_counter,$terms_download,$terms_login,$theme_category_levels,$theme_direct_jump,$theme_images,$theme_images_align_right,$theme_images_number,$themename,$themes_category_navigate_levels,$themes_category_split_pages,$themes_category_split_pages_parents,$themes_category_split_pages_parents_root_node,$themes_column_sorting,$themes_date_column,$themes_in_my_collections,$themes_navlink,$themes_ref_column,$themes_single_collection_shortcut,$themes_with_resources_only,$thumbs,$thumbs_default,$thumbs_display_extended_fields,$thumbs_display_fields,$thumbsize,$title_field,$title_sort,$titlefontsize,$tmpfile,$top_nav_upload,$top_nav_upload_type,$top_nav_upload_user,$topx,$topy,$totalpages,$track_fields,$transparency_background,$tree,$tweak_all_images,$tweak_allow_gamma,$U_perm_strict,$udata_cache,$uniqid,$unnormalized_index,$unoconv_extensions,$unoconv_path,$upload_add_to_new_collection,$upload_add_to_new_collection_opt,$upload_collection_name_required,$upload_do_not_add_to_new_collection_opt,$upload_force_mycollection,$upload_methods,$upload_no_file,$uploader_view_override,$url,$usage_comment_blank,$usage_textbox_below,$use,$use_checkboxes_for_selection,$use_collection_name_in_zip_name,$use_mysqli,$use_order_by_tab_view,$use_phpmailer,$use_plugins_manager,$use_recent_as_home,$use_refine_searchstring,$use_smtp,$use_temp_tables,$use_temp_tables_for_keyword_joins,$use_theme_as_home,$use_theme_bar,$use_watermark,$use_zip_extension,$used_tab_names,$user,$user_account_auto_creation,$user_account_auto_creation_usergroup,$user_account_fullname_create,$user_email,$user_preferences_change_email,$user_preferences_change_name,$user_preferences_change_username,$user_rating,$user_rating_only_once,$user_rating_remove,$user_rating_stats,$user_resources_approved_email,$user_select_sql,$usercollection,$userderestrictfilter,$usereditfilter,$useremail,$userfixedtheme,$userfullname,$usergroup,$usergroupparent,$username,$userpassword,$userpermissions,$userref,$userrequestmode,$userresourcedefaults,$usersearchfilter,$useruploadfolders,$usesize,$value,$values,$video_category,$video_description,$video_keywords,$video_title,$videosplice_parent_field,$videosplice_resourcetype,$videotypes,$view_default_dpi,$view_mapheight,$view_new_material,$view_panels,$view_resource_collections,$view_title_field,$viewInFinder,$w_diff,$warn_field_request_approval,$watermark,$watermark_open,$web_config_edit,$welcome_text_picturepanel,$width,$wildcard_always_applied,$wildcard_expand_limit,$x,$x_diff,$xl_search_result_title_height,$xl_search_results_title_trim,$xl_search_results_title_wordwrap,$xl_thumbs_display_extended_fields,$xl_thumbs_display_fields,$xlthumbs,$xml,$xml_metadump,$xml_metadump_dc_map,$youtube_publish_allow_multiple,$youtube_publish_callback_url,$youtube_publish_client_id,$youtube_publish_client_secret,$youtube_publish_developer_key,$youtube_publish_restypes,$youtube_publish_url_field,$youtube_video_url,$zip,$zip_contents_field,$zip_contents_field_crop,$zipcommand,$zipped_collection_textfile;

        # Capture output using ob_
        ob_start();
        include $fileName;
        $output = ob_get_clean();
        return $output;
    }

    /* The following function used under PHP License from
     * http://php.net/manual/en/function.mime-content-type.php#87856
     */
    private function mime_content_type($filename)
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