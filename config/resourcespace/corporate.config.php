<?php
#################################
## LegacyRS
## Local Configuration File
## Sample for Corporate DAM
#################################

# All custom settings should be entered in this file.
# Options may be copied from config.default.php and configured here.

# https recommended
$baseurl = "https://default.dam4.org";

# Enter randomized values for site security
$spider_password="TBTT6FD";
$scramble_key="abcdef123";
$api_scramble_key="abcdef123";

# MySQL database settings
$mysql_server = "localhost";    # Use 'localhost' if MySQL is installed on the same server as your web server.
$mysql_username = "root";       # MySQL username
$mysql_password = "";           # MySQL password
$mysql_db = "resourcespace";    # MySQL database name
$mysql_bin_path = '/usr/bin';

# Paths
$imagemagick_path = '/usr/bin';
$ghostscript_path = '/usr/bin';
$ffmpeg_path = '/usr/bin';
$exiftool_path = '/usr/bin';
$antiword_path = '/usr/bin';
$pdftotext_path = '/usr/bin';

$ftp_server = 'my.ftp.server';
$ftp_username = 'my_username';
$ftp_password = 'my_password';
$ftp_defaultfolder = 'temp/';
$thumbs_display_fields = array(8,3);
$list_display_fields = array(8,3,12);
$sort_fields = array(12);
$imagemagick_colorspace = "sRGB";

# Custom Settings

# --=== SITE CONFIGURATION ===--
# Site Configuration
$defaultlanguage = "en-US"; # default language, uses ISO 639-1 language codes ( en, es etc.)
$applicationname = "Digital Asset Management 4 Your Company"; # The name of your implementation / installation (e.g. 'MyCompany Resource System')

# Custom logo only available on slimheader
$slimheader=true;
$linkedheaderimgsrc = ""; # recommend $baseurl . "/my/path"
$header_link=true; // turn on to create a clickable area over a logo graphic (to go to home page).

# Email settings
$email_from = "my@email.dam";
$email_notify = "my@email.dam";

# Display the Research Request functionality?
# Allows users to request resources via a form, which is e-mailed.
$research_request = true;

# If you agree to send occasional statistics to Montala, leave this set to 'yes'.
$send_statistics=false;

# experimental email notification of php errors to $email_notify.
$email_errors=true;
$email_errors_address="my@email.dam";

# --=== ACCOUNTS/AUTHENTICATION ===--
# "U" permission allows management of users in the current group as well as children groups. TO test stricter adherence to the idea of "children only", set this to true.
$U_perm_strict=true;
# Default group when adding new users;
$default_group=15; # Matches "Registered Users" in DaleyCRM default database
# User account application - auto creation
# By default this is switched off and applications for new user accounts will be sent as e-mails
# Enabling this option means user accounts will be created but will need to be approved by an administrator
# before the user can log in.
$user_account_auto_creation=false;
$user_account_auto_creation_usergroup=$default_group; # which user group for auto-created accounts? (see also $registration_group_select - allows users to select the group themselves).
# Automatically approve ALL account requests (created via $user_account_auto_creation above)?
$auto_approve_accounts=false;
# Require terms on first login?
$terms_login=false;

# --=== PAGE TITLES ===--
# show the title of the resource being viewed in the browser title bar
$show_resource_title_in_titlebar = true;
# When displaying title of the resource, set the following to true if you want to show Upload resources or Edit resource when on edit page:
$distinguish_uploads_from_edits=true;
# whether all/additional keywords should be displayed in search titles (ex. "Recent 1000 / pdf")
$search_titles_searchcrumbs = true;

# --=== HEADER MENU ===--
# Show the about us link?
$about_link=true;
# Show the contact us link?
$contact_link=true;
$nav2contact_link = false;
# Custom top navigation links.
# You can add as many panels as you like. They must be numbered sequentially starting from zero (0,1,2,3 etc.)
# URL should be absolute, or include $baseurl as below, because a relative URL will not work from the Team Center.
# Since configuration is prior to $lang availability, use a special syntax prefixing the string "(lang)" to access $lang['mytitle']:
# ex:
# $custom_top_nav[0]["title"]="(lang)mytitle";
# $custom_top_nav[0]["title"]="Example Link A";
# $custom_top_nav[0]["link"]="$baseurl/pages/search.php?search=a";

# --=== HOMEPAGE SETTINGS ===--
# Use the recent page as the home page?
$use_recent_as_home=true;
# Default home page (when not using themes as the home page).
# You can set other pages, for example search results, as the home page e.g.
# $default_home_page="search.php?search=example";
$default_home_page="home.php";

# Options to show/hide the link panels on the home page
$home_themeheaders=false;
$home_themes=false;
$home_mycollections=true;
$home_helpadvice=false;

# If using the default homepage...

# Set folder for home images. Ex: "gfx/homeanim/mine/"
# Files should be numbered sequentially, and will be auto-counted.
$homeanim_folder="gfx/homeanim/gfx";
# Option to move the welcome text into the Home Picture Panel. Stops text from falling behind other panels.
$welcome_text_picturepanel=false;
#
# Custom panels for the home page.
# You can add as many panels as you like. They must be numbered sequentially starting from zero (0,1,2,3 etc.)
#
# You may want to turn off $home_themes etc. above if you want ONLY your own custom panels to appear on the home page.
#
# The below are examples.
#
# $custom_home_panels[0]["title"]="Custom Panel A";
# $custom_home_panels[0]["text"]="Custom Panel Text A";
# $custom_home_panels[0]["link"]="search.php?search=example";
#
# You can add additional code to a link like this:
# $custom_home_panels[0]["additional"]="target='_blank'";

# --=== THEMES AND COLLECTIONS ===--
# Enable themes (promoted collections intended for showcasing selected resources)
$enable_themes=false;
# How many levels of theme category to show.
# If this is set to more than one, a dropdown box will appear to allow browsing of theme sub-levels
$theme_category_levels=2;
# Show only collections that have resources the current user can see?
$themes_with_resources_only=true;
# Enable a permanently visible 'themes bar' on the left hand side of the screen for quick access to themes.
$use_theme_bar=false;
# Omit archived resources from get_smart_themes (so if all resources are archived, the header won't show)
# Generally it's not possible to check for the existence of results based on permissions,
# but in the case of archived files, an extra join can help narrow the smart theme results to active resources.
$smart_themes_omit_archived=false;

# add a prefix to all collection refs, to distinguish them from resource refs
$collection_prefix = "COLL";
# Remove archived resources from collections results unless user has e2 permission (admins).
$collections_omit_archived=true;
# Use the collection name in the downloaded zip filename when downloading collections as a zip file?
$use_collection_name_in_zip_name=true;
# Enable public collections
# Public collections are collections that have been set as public by users and are searchable at the bottom
# of the themes page. Note that, if turned off, it will still be possible for administrators to set collections
# as public as this is how themes are published.
$enable_public_collections=false;
# Hide owner in list of public collections
$collection_public_hide_owner=true;

# --=== RESOURCE SETTINGS ===--
# The year of the earliest resource record, used for the date selector on the search form. Unless you are adding existing resources to the system, probably best to set this to the current year at the time of installation.
$minyear=2010;
# Use imperial instead of metric for the download size guidelines
$imperial_measurements=false;
# Should resource views be logged for reporting purposes?
# Note that general daily statistics for each resource are logged anyway for the statistics graphs
# - this option relates to specific user tracking for the more detailed report.
$log_resource_views=false;
# use hit count functionality to track downloads rather than resource views.
$resource_hit_count_on_downloads=false;
$show_hitcount=false;

# enable a list of collections that a resource belongs to, on the view page
$view_resource_collections=true;
# Contact Sheet feature, and whether contact sheet becomes resource.
# Requires ImageMagick/Ghostscript.
$contact_sheet=false;
# Show the 'contributed by' on the resource view page.
$show_contributed_by=true;

# Option to select metadata field that will be used for downloaded filename (do not include file extension)
$download_filename_field=8; # Title
# Require terms for download?
$terms_download=false;

# Enable user rating of resources
# Users can rate resources using a star ratings system on the resource view page.
# Average ratings are automatically calculated and used for the 'popularity' search ordering.
$user_rating=false;
# Display User Rating Stars in search views (a popularity column in list view)
$display_user_rating_stars=false;
# Allow each user only one rating per resource (can be edited). Note this will remove all accumlated ratings/weighting on newly rated items.
$user_rating_only_once=false;
# if user_rating_only_once, allow a log view of user's ratings (link is in the rating count on the View page):
$user_rating_stats=false;
# Allow user to remove their rating.
$user_rating_remove=true;
# Search for a minimum number of stars in Simple search/Advanaced Search (requires $$display_user_rating_stars)
$star_search=false;

# --=== SEARCH ===--
# What is the default display mode for search results? (smallthumbs/thumbs/list)
$default_display="list";
# Having keywords_remove_diacritics set to true means that diacritics will be removed for indexing e.g. 'zwälf' is indexed as 'zwalf', 'café' is indexed as 'cafe'.
# The actual data is not changed, this only affects searching and indexing
$keywords_remove_diacritics=true;
# Index the unnormalized keyword in addition to the normalized version, also applies to keywords with diacritics removed. Quoted search can then be used to find matches for original unnormalized keyword.
$unnormalized_index=true;
# use_refine_searchstring can improve search string parsing. disabled by Dan due to an issue I was unable to replicate. (tom)
$use_refine_searchstring=true;

# --=== EMAIL AND SHARE SETTINGS ===--
# Use an external SMTP server for outgoing emails (e.g. Gmail).
# Requires $use_phpmailer.
$use_smtp=false;
# SMTP settings:
$smtp_secure=''; # '', 'tls' or 'ssl'. For Gmail, 'tls' or 'ssl' is required.
$smtp_host=''; # Hostname, e.g. 'smtp.gmail.com'.
$smtp_port=25; # Port number, e.g. 465 for Gmail using SSL.
$smtp_auth=true; # Send credentials to SMTP server (false to use anonymous access)
$smtp_username=''; # Username (full email address).
$smtp_password=''; # Password.
# Allow a user to CC oneself when sending resources or collections.
$cc_me=false;

# enable remote apis (if using API, RSS2, or other plugins that allow remote authentication via an api key)
$enable_remote_apis=false;

# Hide "Generate URL" from the collection_share.php page?
$hide_collection_share_generate_url=true;
# Hide "Generate URL" from the resource_share.php page?
$hide_resource_share_generate_url=true;

