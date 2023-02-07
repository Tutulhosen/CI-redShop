<?php
if (isset($header)) {
    echo $header;
}

/*
 * Country List
 * https://gist.github.com/DHS/1340150
 */
?>

<?php
$Countries = [
    ['code' => 'US', 'name' => 'United States'],
    ['code' => 'CA', 'name' => 'Canada'],
    ['code' => 'AU', 'name' => 'Australia'],
    ['code' => 'FR', 'name' => 'France'],
    ['code' => 'DE', 'name' => 'Germany'],
    ['code' => 'IS', 'name' => 'Iceland'],
    ['code' => 'IE', 'name' => 'Ireland'],
    ['code' => 'IT', 'name' => 'Italy'],
    ['code' => 'ES', 'name' => 'Spain'],
    ['code' => 'SE', 'name' => 'Sweden'],
    ['code' => 'AT', 'name' => 'Austria'],
    ['code' => 'BE', 'name' => 'Belgium'],
    ['code' => 'FI', 'name' => 'Finland'],
    ['code' => 'CZ', 'name' => 'Czech Republic'],
    ['code' => 'DK', 'name' => 'Denmark'],
    ['code' => 'NO', 'name' => 'Norway'],
    ['code' => 'GB', 'name' => 'United Kingdom'],
    ['code' => 'CH', 'name' => 'Switzerland'],
    ['code' => 'NZ', 'name' => 'New Zealand'],
    ['code' => 'RU', 'name' => 'Russian Federation'],
    ['code' => 'PT', 'name' => 'Portugal'],
    ['code' => 'NL', 'name' => 'Netherlands'],
    ['code' => 'IM', 'name' => 'Isle of Man'],
    ['code' => 'AF', 'name' => 'Afghanistan'],
    ['code' => 'AX', 'name' => 'Aland Islands '],
    ['code' => 'AL', 'name' => 'Albania'],
    ['code' => 'DZ', 'name' => 'Algeria'],
    ['code' => 'AS', 'name' => 'American Samoa'],
    ['code' => 'AD', 'name' => 'Andorra'],
    ['code' => 'AO', 'name' => 'Angola'],
    ['code' => 'AI', 'name' => 'Anguilla'],
    ['code' => 'AQ', 'name' => 'Antarctica'],
    ['code' => 'AG', 'name' => 'Antigua and Barbuda'],
    ['code' => 'AR', 'name' => 'Argentina'],
    ['code' => 'AM', 'name' => 'Armenia'],
    ['code' => 'AW', 'name' => 'Aruba'],
    ['code' => 'AZ', 'name' => 'Azerbaijan'],
    ['code' => 'BS', 'name' => 'Bahamas'],
    ['code' => 'BH', 'name' => 'Bahrain'],
    ['code' => 'BD', 'name' => 'Bangladesh'],
    ['code' => 'BB', 'name' => 'Barbados'],
    ['code' => 'BY', 'name' => 'Belarus'],
    ['code' => 'BZ', 'name' => 'Belize'],
    ['code' => 'BJ', 'name' => 'Benin'],
    ['code' => 'BM', 'name' => 'Bermuda'],
    ['code' => 'BT', 'name' => 'Bhutan'],
    ['code' => 'BO', 'name' => 'Bolivia, Plurinational State of'],
    ['code' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba'],
    ['code' => 'BA', 'name' => 'Bosnia and Herzegovina'],
    ['code' => 'BW', 'name' => 'Botswana'],
    ['code' => 'BV', 'name' => 'Bouvet Island'],
    ['code' => 'BR', 'name' => 'Brazil'],
    ['code' => 'IO', 'name' => 'British Indian Ocean Territory'],
    ['code' => 'BN', 'name' => 'Brunei Darussalam'],
    ['code' => 'BG', 'name' => 'Bulgaria'],
    ['code' => 'BF', 'name' => 'Burkina Faso'],
    ['code' => 'BI', 'name' => 'Burundi'],
    ['code' => 'KH', 'name' => 'Cambodia'],
    ['code' => 'CM', 'name' => 'Cameroon'],
    ['code' => 'CV', 'name' => 'Cape Verde'],
    ['code' => 'KY', 'name' => 'Cayman Islands'],
    ['code' => 'CF', 'name' => 'Central African Republic'],
    ['code' => 'TD', 'name' => 'Chad'],
    ['code' => 'CL', 'name' => 'Chile'],
    ['code' => 'CN', 'name' => 'China'],
    ['code' => 'CX', 'name' => 'Christmas Island'],
    ['code' => 'CC', 'name' => 'Cocos (Keeling) Islands'],
    ['code' => 'CO', 'name' => 'Colombia'],
    ['code' => 'KM', 'name' => 'Comoros'],
    ['code' => 'CG', 'name' => 'Congo'],
    ['code' => 'CD', 'name' => 'Congo, the Democratic Republic of the'],
    ['code' => 'CK', 'name' => 'Cook Islands'],
    ['code' => 'CR', 'name' => 'Costa Rica'],
    ['code' => 'CI', 'name' => 'Cote d\'Ivoire'],
    ['code' => 'HR', 'name' => 'Croatia'],
    ['code' => 'CU', 'name' => 'Cuba'],
    ['code' => 'CW', 'name' => 'Curaçao'],
    ['code' => 'CY', 'name' => 'Cyprus'],
    ['code' => 'DJ', 'name' => 'Djibouti'],
    ['code' => 'DM', 'name' => 'Dominica'],
    ['code' => 'DO', 'name' => 'Dominican Republic'],
    ['code' => 'EC', 'name' => 'Ecuador'],
    ['code' => 'EG', 'name' => 'Egypt'],
    ['code' => 'SV', 'name' => 'El Salvador'],
    ['code' => 'GQ', 'name' => 'Equatorial Guinea'],
    ['code' => 'ER', 'name' => 'Eritrea'],
    ['code' => 'EE', 'name' => 'Estonia'],
    ['code' => 'ET', 'name' => 'Ethiopia'],
    ['code' => 'FK', 'name' => 'Falkland Islands (Malvinas)'],
    ['code' => 'FO', 'name' => 'Faroe Islands'],
    ['code' => 'FJ', 'name' => 'Fiji'],
    ['code' => 'GF', 'name' => 'French Guiana'],
    ['code' => 'PF', 'name' => 'French Polynesia'],
    ['code' => 'TF', 'name' => 'French Southern Territories'],
    ['code' => 'GA', 'name' => 'Gabon'],
    ['code' => 'GM', 'name' => 'Gambia'],
    ['code' => 'GE', 'name' => 'Georgia'],
    ['code' => 'GH', 'name' => 'Ghana'],
    ['code' => 'GI', 'name' => 'Gibraltar'],
    ['code' => 'GR', 'name' => 'Greece'],
    ['code' => 'GL', 'name' => 'Greenland'],
    ['code' => 'GD', 'name' => 'Grenada'],
    ['code' => 'GP', 'name' => 'Guadeloupe'],
    ['code' => 'GU', 'name' => 'Guam'],
    ['code' => 'GT', 'name' => 'Guatemala'],
    ['code' => 'GG', 'name' => 'Guernsey'],
    ['code' => 'GN', 'name' => 'Guinea'],
    ['code' => 'GW', 'name' => 'Guinea-Bissau'],
    ['code' => 'GY', 'name' => 'Guyana'],
    ['code' => 'HT', 'name' => 'Haiti'],
    ['code' => 'HM', 'name' => 'Heard Island and McDonald Islands'],
    ['code' => 'VA', 'name' => 'Holy See (Vatican City State)'],
    ['code' => 'HN', 'name' => 'Honduras'],
    ['code' => 'HK', 'name' => 'Hong Kong'],
    ['code' => 'HU', 'name' => 'Hungary'],
    ['code' => 'IN', 'name' => 'India'],
    ['code' => 'ID', 'name' => 'Indonesia'],
    ['code' => 'IR', 'name' => 'Iran, Islamic Republic of'],
    ['code' => 'IQ', 'name' => 'Iraq'],
//                    [ 'code' => 'IL', 'name' => 'Israel'],
    ['code' => 'JM', 'name' => 'Jamaica'],
    ['code' => 'JP', 'name' => 'Japan'],
    ['code' => 'JE', 'name' => 'Jersey'],
    ['code' => 'JO', 'name' => 'Jordan'],
    ['code' => 'KZ', 'name' => 'Kazakhstan'],
    ['code' => 'KE', 'name' => 'Kenya'],
    ['code' => 'KI', 'name' => 'Kiribati'],
    ['code' => 'KP', 'name' => 'Korea, Democratic People\'s Republic of'],
    ['code' => 'KR', 'name' => 'Korea, Republic of'],
    ['code' => 'KW', 'name' => 'Kuwait'],
    ['code' => 'KG', 'name' => 'Kyrgyzstan'],
    ['code' => 'LA', 'name' => 'Lao People\'s Democratic Republic'],
    ['code' => 'LV', 'name' => 'Latvia'],
    ['code' => 'LB', 'name' => 'Lebanon'],
    ['code' => 'LS', 'name' => 'Lesotho'],
    ['code' => 'LR', 'name' => 'Liberia'],
    ['code' => 'LY', 'name' => 'Libyan Arab Jamahiriya'],
    ['code' => 'LI', 'name' => 'Liechtenstein'],
    ['code' => 'LT', 'name' => 'Lithuania'],
    ['code' => 'LU', 'name' => 'Luxembourg'],
    ['code' => 'MO', 'name' => 'Macao'],
    ['code' => 'MK', 'name' => 'Macedonia'],
    ['code' => 'MG', 'name' => 'Madagascar'],
    ['code' => 'MW', 'name' => 'Malawi'],
    ['code' => 'MY', 'name' => 'Malaysia'],
    ['code' => 'MV', 'name' => 'Maldives'],
    ['code' => 'ML', 'name' => 'Mali'],
    ['code' => 'MT', 'name' => 'Malta'],
    ['code' => 'MH', 'name' => 'Marshall Islands'],
    ['code' => 'MQ', 'name' => 'Martinique'],
    ['code' => 'MR', 'name' => 'Mauritania'],
    ['code' => 'MU', 'name' => 'Mauritius'],
    ['code' => 'YT', 'name' => 'Mayotte'],
    ['code' => 'MX', 'name' => 'Mexico'],
    ['code' => 'FM', 'name' => 'Micronesia, Federated States of'],
    ['code' => 'MD', 'name' => 'Moldova, Republic of'],
    ['code' => 'MC', 'name' => 'Monaco'],
    ['code' => 'MN', 'name' => 'Mongolia'],
    ['code' => 'ME', 'name' => 'Montenegro'],
    ['code' => 'MS', 'name' => 'Montserrat'],
    ['code' => 'MA', 'name' => 'Morocco'],
    ['code' => 'MZ', 'name' => 'Mozambique'],
    ['code' => 'MM', 'name' => 'Myanmar'],
    ['code' => 'NA', 'name' => 'Namibia'],
    ['code' => 'NR', 'name' => 'Nauru'],
    ['code' => 'NP', 'name' => 'Nepal'],
    ['code' => 'NC', 'name' => 'New Caledonia'],
    ['code' => 'NI', 'name' => 'Nicaragua'],
    ['code' => 'NE', 'name' => 'Niger'],
    ['code' => 'NG', 'name' => 'Nigeria'],
    ['code' => 'NU', 'name' => 'Niue'],
    ['code' => 'NF', 'name' => 'Norfolk Island'],
    ['code' => 'MP', 'name' => 'Northern Mariana Islands'],
    ['code' => 'OM', 'name' => 'Oman'],
    ['code' => 'PK', 'name' => 'Pakistan'],
    ['code' => 'PW', 'name' => 'Palau'],
    ['code' => 'PS', 'name' => 'Palestinian Territory, Occupied'],
    ['code' => 'PA', 'name' => 'Panama'],
    ['code' => 'PG', 'name' => 'Papua New Guinea'],
    ['code' => 'PY', 'name' => 'Paraguay'],
    ['code' => 'PE', 'name' => 'Peru'],
    ['code' => 'PH', 'name' => 'Philippines'],
    ['code' => 'PN', 'name' => 'Pitcairn'],
    ['code' => 'PL', 'name' => 'Poland'],
    ['code' => 'PR', 'name' => 'Puerto Rico'],
    ['code' => 'QA', 'name' => 'Qatar'],
    ['code' => 'RE', 'name' => 'Reunion'],
    ['code' => 'RO', 'name' => 'Romania'],
    ['code' => 'RW', 'name' => 'Rwanda'],
    ['code' => 'BL', 'name' => 'Saint Barthélemy'],
    ['code' => 'SH', 'name' => 'Saint Helena'],
    ['code' => 'KN', 'name' => 'Saint Kitts and Nevis'],
    ['code' => 'LC', 'name' => 'Saint Lucia'],
    ['code' => 'MF', 'name' => 'Saint Martin (French part)'],
    ['code' => 'PM', 'name' => 'Saint Pierre and Miquelon'],
    ['code' => 'VC', 'name' => 'Saint Vincent and the Grenadines'],
    ['code' => 'WS', 'name' => 'Samoa'],
    ['code' => 'SM', 'name' => 'San Marino'],
    ['code' => 'ST', 'name' => 'Sao Tome and Principe'],
    ['code' => 'SA', 'name' => 'Saudi Arabia'],
    ['code' => 'SN', 'name' => 'Senegal'],
    ['code' => 'RS', 'name' => 'Serbia'],
    ['code' => 'SC', 'name' => 'Seychelles'],
    ['code' => 'SL', 'name' => 'Sierra Leone'],
    ['code' => 'SG', 'name' => 'Singapore'],
    ['code' => 'SX', 'name' => 'Sint Maarten (Dutch part)'],
    ['code' => 'SK', 'name' => 'Slovakia'],
    ['code' => 'SI', 'name' => 'Slovenia'],
    ['code' => 'SB', 'name' => 'Solomon Islands'],
    ['code' => 'SO', 'name' => 'Somalia'],
    ['code' => 'ZA', 'name' => 'South Africa'],
    ['code' => 'GS', 'name' => 'South Georgia and the South Sandwich Islands'],
    ['code' => 'LK', 'name' => 'Sri Lanka'],
    ['code' => 'SD', 'name' => 'Sudan'],
    ['code' => 'SR', 'name' => 'Suriname'],
    ['code' => 'SJ', 'name' => 'Svalbard and Jan Mayen'],
    ['code' => 'SZ', 'name' => 'Swaziland'],
    ['code' => 'SY', 'name' => 'Syrian Arab Republic'],
    ['code' => 'TW', 'name' => 'Taiwan, Province of China'],
    ['code' => 'TJ', 'name' => 'Tajikistan'],
    ['code' => 'TZ', 'name' => 'Tanzania, United Republic of'],
    ['code' => 'TH', 'name' => 'Thailand'],
    ['code' => 'TL', 'name' => 'Timor-Leste'],
    ['code' => 'TG', 'name' => 'Togo'],
    ['code' => 'TK', 'name' => 'Tokelau'],
    ['code' => 'TO', 'name' => 'Tonga'],
    ['code' => 'TT', 'name' => 'Trinidad and Tobago'],
    ['code' => 'TN', 'name' => 'Tunisia'],
    ['code' => 'TR', 'name' => 'Turkey'],
    ['code' => 'TM', 'name' => 'Turkmenistan'],
    ['code' => 'TC', 'name' => 'Turks and Caicos Islands'],
    ['code' => 'TV', 'name' => 'Tuvalu'],
    ['code' => 'UG', 'name' => 'Uganda'],
    ['code' => 'UA', 'name' => 'Ukraine'],
    ['code' => 'AE', 'name' => 'United Arab Emirates'],
    ['code' => 'UM', 'name' => 'United States Minor Outlying Islands'],
    ['code' => 'UY', 'name' => 'Uruguay'],
    ['code' => 'UZ', 'name' => 'Uzbekistan'],
    ['code' => 'VU', 'name' => 'Vanuatu'],
    ['code' => 'VE', 'name' => 'Venezuela, Bolivarian Republic of'],
    ['code' => 'VN', 'name' => 'Viet Nam'],
    ['code' => 'VG', 'name' => 'Virgin Islands, British'],
    ['code' => 'VI', 'name' => 'Virgin Islands, U.S.'],
    ['code' => 'WF', 'name' => 'Wallis and Futuna'],
    ['code' => 'EH', 'name' => 'Western Sahara'],
    ['code' => 'YE', 'name' => 'Yemen'],
    ['code' => 'ZM', 'name' => 'Zambia'],
    ['code' => 'ZW', 'name' => 'Zimbabwe']
];

//sort multidimentional array to asc order by value------------------------------------------------------
function val_sort($array, $key) {
    //Loop through and get the values of our specified key
    foreach ($array as $k => $v) {
        $b[] = strtolower($v[$key]);
    }
    asort($b);
    foreach ($b as $k => $v) {
        $c[] = $array[$k];
    }
    return $c;
}

$country = val_sort($Countries, 'name');

//echo '<pre>';
//print_r($country);
//echo '</pre>';
?>

<style>
    .error{
        color:red;
    }
    .error p{
        color:red;
    }
    .input-border{
        border: 2px solid #ddd !important;
    }



</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>resources/owlcarousel/assets/owl.carousel.min.css" />
<script src="<?php echo base_url(); ?>resources/owlcarousel/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {

        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 5,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [2000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })

    });
</script>
<style>
    input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        /*background-color: #4ba2ba;*/
        background-color: #4fa9ff;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    #example_info{
        color:white;
    }
</style>
<body class="page-template-default page page-id-126 um-page-register um-page-loggedout woocommerce-no-js">

    <!-- Preloader -->

    <!-- Page Wrapper -->
    <div id="page-wrap">

        <?php
        if (isset($menu)) {
            echo $menu;
        }
        ?>

        <!-- Page Content -->
        <div id="page-content">

            <div class="sidebar-alt-wrap">
                <div class="sidebar-alt-close image-overlay"></div>
                <aside class="sidebar-alt">

                    <div class="sidebar-alt-close-btn">
                        <span></span>
                        <span></span>
                    </div>

                    <div class="bard-widget"><p></p></div>		
                </aside>
            </div>
            <div class="main-content clear-fix boxed-wrapper" data-sidebar-sticky="1">

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <!-- Main Container -->
                <div class="main-container">

                    <article id="page-126" class="post-126 page type-page status-publish hentry">

                        <header class="post-header">
                            <h1 class="page-title">Register </h1><span>(<a href="<?php echo base_url(); ?>register/fees" target="_blank">Registration Fees</a>)</span>
                        </header>
                        <!--                        <div class="post-content">
                                                    <div class="um um-register um-118">-->

                        <!--<div class="um-form">-->
                        <style>
                            .blink_me {
                                animation: blinker 1s linear infinite;
                            }

                            @keyframes blinker {
                                50% {
                                    opacity: 0;
                                }
                            }
                        </style>


                        <div class="row">
                            <h2></h2>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                <form  action="<?php echo base_url(); ?>register/create" method="post">
                                    <!--                                            <div class="form-group">
                                                                                    <label for="Username">Username:</label>
                                                                                    <input type="text" class="form-control" id="Username" placeholder="Enter Username" name="username" required="" value="<?php // if (!isset($success)) { echo set_value('username'); }         ?>">
                                                                                </div>-->
                                    <div class="form-group">
                                        <label for="" style="color:red; font-weight: normal" class="">
                                            <b>Debit/Credit Card:</b> If you have a card, please make sure that it is usable over online through your bank. International cards can be transacted only if it is issued by any bank. No virtual card or prepaid card will be allowed to avoid fraudulent activities.
                                        </label>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="" style="color:red; font-weight: normal">Fields marked with asterisk (*) are mandatory</label>

                                    </div>
                                    
                                    <?php
                                    if (!isset($success)) {
                                    ?>
                                    <div class="form-group">
                                        <label for="" style="color:red; font-weight: normal" class="blink_me">
                                            <b>The below required fields are not correct:</b>
                                        </label>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="form-group">
                                        <label for="first_name">First Name: <span class="error">*</span></label>
                                        <input type="text" class="form-control input-border" id="first_name" placeholder="Enter First Name" name="first_name" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('first_name');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('first_name'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name: <span class="error">*</span></label>
                                        <input type="text" class="form-control input-border" id="last_name" placeholder="Enter Last Name" name="last_name" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('last_name');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('last_name'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:  <span class="error">*</span></label>
                                        <input type="email" class="form-control input-border" id="email" placeholder="Enter email" name="email" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('email');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('email'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Designation">Designation:</label>
                                        <input type="text" class="form-control input-border" id="Designation" placeholder="Enter Designation" name="designation" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('designation');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('designation'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Organisation">Organization:</label>
                                        <input type="text" class="form-control input-border" id="Organisation" placeholder="Enter Organisation" name="organisation"  value="<?php
                                        if (!isset($success)) {
                                            echo set_value('organisation');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('organisation'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Cellphone">Cell phone: <span class="error">*</span></label>
                                        <input type="text" class="form-control input-border" id="Cellphone" placeholder="Enter Cell Phone" name="phone" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('phone');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('phone'); ?></span>
                                    </div>
                                    <!--                                    <div class="form-group">
                                                                            <label for="Officephone">Office phone:</label>
                                                                            <input type="text" class="form-control input-border" id="Officephone" placeholder="Enter Office Phone" name="office_phone" value="<?php
//                                        if (!isset($success)) {
//                                            echo set_value('office_phone');
//                                        }
                                    ?>">
                                                                            <span class="help-block first_name error"><?php // echo form_error('office_phone');   ?></span>
                                                                        </div>-->

                                    <div class="form-group">
                                        <label for="AddressLine1">Address Line1: <span class="error">*</span></label>
                                        <input type="text" class="form-control input-border" id="AddressLine1" placeholder="Enter Address Line1" name="address_line1" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('address_line1');
                                        }
                                        ?>">
                                        <span class="help-block error"><?php echo form_error('address_line1'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="AddressLine2">Address Line2:</label>
                                        <input type="text" class="form-control input-border" id="AddressLine2" placeholder="Enter Address Line2" name="address_line2"  value="<?php
                                        if (!isset($success)) {
                                            echo set_value('address_line2');
                                        }
                                        ?>">
                                        <span class="help-block error"><?php echo form_error('address_line2'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="City">City: <span class="error">*</span></label>
                                        <input type="text" class="form-control input-border" id="City" placeholder="Enter City" name="city" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('city');
                                        }
                                        ?>">
                                        <span class="help-block error"><?php echo form_error('city'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="State">State:</label>
                                        <input type="text" class="form-control input-border" id="State" placeholder="Enter State" name="state"  value="<?php
                                        if (!isset($success)) {
                                            echo set_value('state');
                                        }
                                        ?>">
                                        <span class="help-block error"><?php echo form_error('state'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal">Postal Code: <span class="error">*</span></label>
                                        <input type="text" class="form-control input-border" id="postal" placeholder="Enter Postal Code" name="post_code" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('post_code');
                                        }
                                        ?>">
                                        <span class="help-block error"><?php echo form_error('post_code'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Country">Country: <span class="error">*</span></label>
                                        <select id="Country" name="country" class="form-control input-border" required="">
                                            <?php if (!isset($success)) { ?>
                                                <option value="<?php echo set_value('country'); ?>"><?php echo set_value('country'); ?></option>
                                            <?php } else { ?>
                                                <option value="">=Select Country=</option>
                                            <?php } ?>
                                            <?php foreach ($country as $cRow) { ?>
                                                <option value="<?php echo $cRow['name']; ?>"><?php echo $cRow['name']; ?></option>
                                            <?php } ?>

                                        </select>
                                        <span class="help-block error"><?php echo form_error('country'); ?></span>
                                    </div>

                                    <!--                                    <div class="form-group">
                                                                            <label for="PostalAddress">Postal Address:</label>
                                                                            <input type="text" class="form-control" id="PostalAddress" placeholder="Enter Postal Address" name="address" required="" value="<?php
                                    if (!isset($success)) {
//                                                echo set_value('address');
                                    }
                                    ?>">
                                                                            <span class="help-block first_name error"><?php // echo form_error('address');        ?></span>
                                                                        </div>-->

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $("#RegistrationCategory").change(function (event) {
                                                /* stop form from submitting normally */
                                                var values = "RegistrationCategory=" + $("#RegistrationCategory").val();
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>register/registration_category",
                                                    type: "POST",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (data) {
                                                        //                                                        $("#spop").html(data).slideDown("slow");
                                                        $(".fees_siteVisit").empty();
                                                        $(".fees_view").html(data);

                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });
                                    </script>	

                                    <div class="form-group">
                                        <label for="pwd">Password:  <span class="error">*</span></label> <br>
                                        (<span>Password for conference website login</span>)
                                        <input type="password" class="form-control input-border" id="pwd" placeholder="Password min 6 char" name="password" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('password');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('password'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd2">Confirm Password: <span class="error">*</span></label>
                                        <input type="password" class="form-control input-border" id="pwd2" placeholder="Confirm password min 6 char" name="confirm_password" required="" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('confirm_password');
                                        }
                                        ?>">
                                        <span class="help-block first_name error"><?php echo form_error('confirm_password'); ?></span>
                                    </div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $(".registration_asYes").change(function (event) {
                                                /* stop form from submitting normally */
                                                var values = "registration_as=" + $(".registration_asYes").val();
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>register/registration_as",
                                                    type: "POST",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (data) {
                                                        //                                                        $("#spop").html(data).slideDown("slow");
                                                        $(".registrationAS").html(data);
                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });
                                    </script>	
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $(".registration_asNo").change(function (event) {
                                                /* stop form from submitting normally */
                                                var values = "registration_as=" + $(".registration_asNo").val();
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>register/registration_as",
                                                    type: "POST",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (data) {
//                                                        $("#spop").html(data).slideDown("slow");
//alert('data');
                                                        $(".registrationAS").empty();
                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });
                                    </script>	

                                    <div class="form-group">
                                        <label for="">Registration As: &nbsp; &nbsp; 
                                        </label>

                                        <input type='radio' class="registration_asYes" name="registration_as" value="Author" <?php
                                        if (!isset($success)) {
                                            if (set_value('registration_as') == 'Author') {
                                                ?> checked="" <?php
                                                   }
                                               }
                                               ?> /> Author &nbsp; &nbsp; &nbsp; &nbsp;
                                        <input type='radio' class="registration_asNo" name="registration_as" value="Audience" <?php
                                        if (!isset($success)) {
                                            if (set_value('registration_as') == 'Audience') {
                                                ?> checked="" <?php
                                                   }
                                               } else {
                                                   echo 'checked';
                                               }
                                               ?> /> Audience
                                        <br>
                                        <!--(Site visit fees for local student/participants BDT 2500 and foreign student/participants USD 30)-->                                     
                                    </div>

                                    <div class="registrationAS"> 
                                        <?php if (set_value('registration_as') == 'Author') { ?>

                                            <div class="form-group">
                                                <label for="paper_code">Paper Code: <span class="error">*</span></label>
                                                <input type="text" class="form-control input-border" id="paper_code" placeholder="Enter Paper Code" name="paper_code" required="" value="<?php
                                                if (!isset($success)) {
                                                    echo set_value('paper_code');
                                                }
                                                ?>">
                                                <span class="help-block paper_code error"><?php echo form_error('paper_code'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="paper_title">Paper Title: <span class="error">*</span></label>
                                                <input type="text" class="form-control input-border" id="paper_title" placeholder="Enter Paper Title" name="paper_title" required="" value="<?php
                                                if (!isset($success)) {
                                                    echo set_value('paper_title');
                                                }
                                                ?>">
                                                <span class="help-block paper_title error"><?php echo form_error('paper_title'); ?></span>
                                            </div>

                                        <?php }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="RegistrationCategory">Registration Category: <span class="error">*</span></label>
                                        <p>(If Student, you have to bring your valid student ID card at conference venue.)</p>
                                        <select id="RegistrationCategory" name="registration_category" class="form-control input-border" required="">
                                            <?php if (!isset($success)) { ?>
                                                <option value="<?php echo set_value('registration_category'); ?>"><?php echo set_value('registration_category'); ?></option>
                                            <?php } else { ?>
                                                <option value="">=Select=</option>
                                            <?php } ?>
                                            <option value="Student">Student</option>
                                            <option value="Participant">Professional and others</option>
                                        </select>
                                    </div>


                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $("#Nationality").change(function (event) {
                                                /* stop form from submitting normally */
                                                var values = "nationality=" + $("#Nationality").val();
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>register/registration_category",
                                                    type: "POST",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (data) {
                                                        //                                                        $("#spop").html(data).slideDown("slow");
                                                        $(".fees_siteVisit").empty();
                                                        $(".fees_view").html(data);
                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });
                                    </script>	
                                    <div class="form-group">
                                        <label for="Nationality">Nationality: <span class="error">*</span></label>
                                        <select id="Nationality" name="nationality" class="form-control input-border" required="">
                                            <?php if (!isset($success)) { ?>
                                                <option value="<?php echo set_value('nationality'); ?>"><?php echo set_value('nationality'); ?></option>
                                            <?php } else { ?>
                                                <option value="">=Select=</option>
                                            <?php } ?>
                                            <option value="Bangladeshi">Bangladeshi</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>

                                    <!--                                    <div class="form-group">
                                                                            <label for="CardType">Card Type:</label>
                                                                            <select id="CardType" name="card_type" class="form-control input-border" required="">
                                    <?php // if (!isset($success)) {  ?>
                                                                                    <option value="<?php // echo set_value('card_type');     ?>"><?php // echo set_value('card_type');     ?></option>
                                    <?php // } else {  ?>
                                                                                    <option value="">=Select=</option>
                                    <?php // }  ?>
                                                                                <option value="VISA"> VISA </option>
                                                                                <option value="MASTER"> MASTER </option>
                                                                                <option value="AMEX"> AMEX </option>
                                                                                <option value="bKash"> bKash </option>
                                                                            </select>
                                                                        </div>-->

                                    <div class="fees_view">
                                    </div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $(".siteVisit").change(function (event) {
                                                /* stop form from submitting normally */
                                                var values = "siteVisit=" + $(".siteVisit").val();
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>register/registration_site_visit",
                                                    type: "POST",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (data) {
                                                        //                                                        $("#spop").html(data).slideDown("slow");
                                                        $(".fees_siteVisit").html(data);
                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });
                                    </script>	
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $(".siteVisitNo").change(function (event) {
                                                /* stop form from submitting normally */
                                                var values = "siteVisit=" + $(".siteVisitNo").val();
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>register/registration_site_visit",
                                                    type: "POST",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },
                                                    success: function (data) {
                                                        //                                                        $("#spop").html(data).slideDown("slow");
                                                        $(".fees_siteVisit").empty();
                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });
                                    </script>	

                                    <div class="form-group">
                                        <label for="">Site visit: &nbsp; &nbsp;
                                        </label>

                                        <input type='radio' class="siteVisit" name="site_visit" value="Yes" <?php
                                        if (!isset($success)) {
                                            if (set_value('site_visit') == 'Yes') {
                                                ?> checked="" <?php
                                                   }
                                               }
                                               ?> /> Yes &nbsp; &nbsp; &nbsp; &nbsp;
                                        <input type='radio' class="siteVisitNo" name="site_visit" value="No" <?php
                                        if (!isset($success)) {
                                            if (set_value('site_visit') == 'No') {
                                                ?> checked="" <?php
                                                   }
                                               } else {
                                                   echo 'checked';
                                               }
                                               ?> /> No
                                        <br>
                                        <div style="padding-left:50px">
                                            <ul>
                                                <li><b>1.</b> For Local Students/ Professional and others <b>BDT 2500</b></li>
                                                <li><b>2.</b> For Foreign Students/ Professional and others <b>USD 30</b></li>
                                            </ul>
                                        </div>
                                        <!--(Site visit fees for local student/participants BDT 2500 and foreign student/participants USD 30)-->                                     
                                    </div>
                                    <div class="fees_siteVisit">
                                    </div>

                                    <div class="captcha samefield removeHide">
                                        <figure class="devsite-landing-row-item-image" style="color:red">
                                            <div class="g-recaptcha" data-sitekey="6LdErAwUAAAAANBahAJ21mF9pkAflst4N0WBcOG8"></div>
                                            <span style="color:red"><?php echo form_error('g-recaptcha-response'); ?></span>
                                        </figure>
                                    </div>

                                    <div class="form-group">
                                        <div class="owl-carousel owl-theme">
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/visa.png" width="80" /></h4></div>
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/mastercard.png" width="80" /></h4></div>
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/amex.png" width="80" /></h4></div>
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/discover.png" width="80" /></h4></div>
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/bkash.png" width="80" /></h4></div>
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/rocket-dbbl.png" width="80" /></h4></div>
                                            <div class="item"><h4><img src="<?php echo base_url(); ?>resources/payments/dbbl.png" width="80" /></h4></div>

                                        </div>
                                    </div>
                                    <!--                                    <div class="form-group">
                                                                            <p style="margin-bottom:10px;">(<b>Debit/Credit Card:</b> If you have a card, please make sure that it is usable over online through your bank. International cards can be transacted only if it is issued by any bank. No virtual card or prepaid card will be allowed to avoid fraudulent activities.)
                                                                            </p>
                                                                        </div>-->
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="terms" required="" value="Yes" <?php
                                            if (!isset($success)) {
                                                if (set_value('terms')) {
                                                    ?> checked="" <?php
                                                          }
                                                      }
                                                      ?>>I agree to your <a href="#">Terms and Condition</a></label>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-info btn-lg">Register</button>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <a href="<?php echo base_url(); ?>login" class="btn btn-default btn-lg active">Login</a>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <!--</div>-->

<!--                            </div><style type="text/css">
                                .um-118.um {
                                    max-width: 550px;
                                }</style>
                        </div>-->
                    </article>
                </div><!-- .main-container -->
                <?php
                if (isset($right_sidebar)) {
                    echo $right_sidebar;
                }
                ?>
            </div><!-- #page-content -->

        </div><!-- #page-content -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php if (!set_value('email')) { { ?>
                <script type="text/javascript">
        //                $(window).on('load', function () {
        //                    $('#myModal2').modal('show');
        //                });
                </script>
            <?php }
        }
        ?>
        <!-- Trigger the modal with a button -->
        <!--        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="display:none">Open Modal</button>
        
                 Modal 
                <div id="myModal2" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                         Modal content
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="color:red">Important Notice for International Debit/Credit Card Payments</h4>
                            </div>
                            <div class="modal-body">
                                <p> If you have a card, please make sure that it is usable over online through your bank. International cards can be transacted only if it is issued by any bank. No virtual card or prepaid card will be allowed to avoid fraudulent activities.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>-->

        <?php
        if (isset($footer)) {
            echo $footer;
        }
        ?>