<!DOCTYPE html>
<html  lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bechifa</title>
    @yield('styles')
    @stack('scripts')

    <link rel='stylesheet' id='dashicons-css'  href='https://amentotech.com/projects/doctreat/wp-includes/css/dashicons.min.css?ver=6.0.7' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-vendors-style-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-vendors-style.css?ver=9.6.6' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-style.css?ver=9.6.6' type='text/css' media='all' />

    <link rel='stylesheet' id='redux-extendify-styles-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/redux-framework/redux-core/assets/css/extendify-utilities.css?ver=4.4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.7.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CPoppins:300,400,500,600,700&#038;subset=latin,latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='dokan-style-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/dokan-lite/assets/css/style.css?ver=1681118834' type='text/css' media='all' />
    <link rel='stylesheet' id='dokan-modal-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/dokan-lite/assets/vendors/izimodal/iziModal.min.css?ver=1681118834' type='text/css' media='all' />
    <link rel='stylesheet' id='dokan-fontawesome-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/dokan-lite/assets/vendors/font-awesome/font-awesome.min.css?ver=3.7.15' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/bootstrap.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='fontawesome-all-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/fontawesome/fontawesome-all.min.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='linearicons-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/linearicons.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='themify-icons-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/themify-icons.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='select2-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/woocommerce/assets/css/select2.css?ver=7.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-typo-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/typo.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='scrollbar-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/scrollbar.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='datetimepicker-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/datetimepicker.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='fullcalendar-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/js/fullcalendar/lib/main.min.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-elements-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/elements.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-style-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/style.css?ver=1.5.9' type='text/css' media='all' />

     <link rel='stylesheet' id='basictable-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/basictable.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-dashboard-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/dashboard.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-dbresponsive-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/dbresponsive.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='wpguppy-app-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/wp-guppy/chatapp/dist/css/app.css?ver=4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='wpguppy-vendors-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/wp-guppy/chatapp/dist/css/vendors.css?ver=4.0' type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lineicons@2.0.0/dist/css/line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel='stylesheet' id='wp-guppy-guppy-icons-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/wp-guppy/public/css/guppy-icons.css?ver=4.0' type='text/css' media='all' />
  </head>


  <body class="page-template page-template-directory page-template-dashboard page-template-directorydashboard-php page page-id-14 logged-in wp-embed-responsive theme-doctreat dc-dashboard woocommerce-no-js elementor-default elementor-kit-1451 dokan-theme-doctreat">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-dark-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0.49803921568627" /><feFuncG type="table" tableValues="0 0.49803921568627" /><feFuncB type="table" tableValues="0 0.49803921568627" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-red"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 0.27843137254902" /><feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-midnight"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0" /><feFuncG type="table" tableValues="0 0.64705882352941" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-magenta-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.78039215686275 1" /><feFuncG type="table" tableValues="0 0.94901960784314" /><feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-green"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.44705882352941 0.4" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-orange"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.098039215686275 1" /><feFuncG type="table" tableValues="0 0.66274509803922" /><feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg>			<div id="dc-wrapper" class="dc-wrapper dc-haslayout">

  <header class="header">
    @include('dashboardClientLayouts.header')
  </header>

  <main id="dc-main" class="dc-main dc-haslayout">

  @include('dashboardClientLayouts.sidebar')
  <style>
    .menu-expanded .dc-verticalscrollbar {
        width: 250px;
        transition: width 0.3s ease;
    }

    .dc-verticalscrollbar {
        width: 50px; /* initial width to show only icons */
        transition: width 0.3s ease;
        background-color: #f8f9fa; /* light grey background */
        padding: 10px; /* optional padding */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* optional shadow */
        white-space: nowrap; /* prevent text wrap */
        overflow: hidden; /* hide overflow content */
    }

    .dc-verticalscrollbar ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .dc-verticalscrollbar li {
        display: flex;
        align-items: center;
        padding: 10px 0;
    }

    .dc-verticalscrollbar li a {
        text-decoration: none;
        color: #000;
        display: flex;
        align-items: center;
    }

    .dc-verticalscrollbar li a .icon {
        margin-right: 10px;
    }

    .dc-btnmenutoggle {
        margin-bottom: 10px; /* margin to separate button from menu */
        position: absolute;
        left: 50px; /* position button to be inline with the collapsed menu */
        transition: left 0.3s ease;
    }

    .menu-expanded .dc-btnmenutoggle {
        left: 260px; /* position button to be inline with the expanded menu */
    }
</style>
    <script>
    document.querySelector('.dc-btnmenutoggle').addEventListener('click', function() {
        document.querySelector('body').classList.toggle('menu-expanded');
    });
</script>
            @yield('content')
   </main>
   <footer>
    @include('dashboardClientLayouts.footer')
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/c.js') }}"></script>
    <script src="{{ asset('assets/js/delete-serv.js') }}"></script>
    <script src="{{ asset('assets/js/add-new.js') }}"></script>
    <script src="{{ asset('assets/js/select-subserv.js') }}"></script>
    <script src="{{ asset('assets/js/current_image_upload.js') }}"></script>
    <script src="{{ asset('assets/js/nav-items-selection.js') }}"></script>
    <script src="{{ asset('assets/js/side-bar.js') }}"></script>

</body>
