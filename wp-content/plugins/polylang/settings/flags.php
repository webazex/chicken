<?php

/**

 * @package Polylang

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Don't access directly

};



/**

 * The list of flags

 *

 * For each flag:

 * the key is the flag file name (without the extension)

 * the value is the Country name

 */

$flags = array(

	'ad'        => __( 'Andorra', 'polylang' ),

	'ae'        => __( 'United Arab Emirates', 'polylang' ),

	'af'        => __( 'Afghanistan', 'polylang' ),

	'ag'        => __( 'Antigua and Barbuda', 'polylang' ),

	'ai'        => __( 'Anguilla', 'polylang' ),

	'al'        => __( 'Albania', 'polylang' ),

	'am'        => __( 'Armenia', 'polylang' ),

	'an'        => __( 'Netherlands Antilles', 'polylang' ),

	'ao'        => __( 'Angola', 'polylang' ),

	'ar'        => __( 'Argentina', 'polylang' ),

	'arab'      => __( 'Arab league', 'polylang' ),

	'as'        => __( 'American Samoa', 'polylang' ),

	'at'        => __( 'Austria', 'polylang' ),

	'au'        => __( 'Australia', 'polylang' ),

	'aw'        => __( 'Aruba', 'polylang' ),

	'ax'        => __( 'Åland Islands', 'polylang' ),

	'az'        => __( 'Azerbaijan', 'polylang' ),

	'ba'        => __( 'Bosnia and Herzegovina', 'polylang' ),

	'basque'    => __( 'Basque Country', 'polylang' ),

	'bb'        => __( 'Barbados', 'polylang' ),

	'bd'        => __( 'Bangladesh', 'polylang' ),

	'be'        => __( 'Belgium', 'polylang' ),

	'bf'        => __( 'Burkina Faso', 'polylang' ),

	'bg'        => __( 'Bulgaria', 'polylang' ),

	'bh'        => __( 'Bahrain', 'polylang' ),

	'bi'        => __( 'Burundi', 'polylang' ),

	'bj'        => __( 'Benin', 'polylang' ),

	'bm'        => __( 'Bermuda', 'polylang' ),

	'bn'        => __( 'Brunei', 'polylang' ),

	'bo'        => __( 'Bolivia', 'polylang' ),

	'br'        => __( 'Brazil', 'polylang' ),

	'bs'        => __( 'Bahamas', 'polylang' ),

	'bt'        => __( 'Bhutan', 'polylang' ),

	'bw'        => __( 'Botswana', 'polylang' ),

	'by'        => __( 'Belarus', 'polylang' ),

	'bz'        => __( 'Belize', 'polylang' ),

	'ca'        => __( 'Canada', 'polylang' ),

	'catalonia' => __( 'Catalonia', 'polylang' ),

	'cc'        => __( 'Cocos', 'polylang' ),

	'cd'        => __( 'Democratic Republic of the Congo', 'polylang' ),

	'cf'        => __( 'Central African Republic', 'polylang' ),

	'cg'        => __( 'Congo', 'polylang' ),

	'ch'        => __( 'Switzerland', 'polylang' ),

	'ci'        => __( 'Ivory Coast', 'polylang' ),

	'ck'        => __( 'Cook Islands', 'polylang' ),

	'cl'        => __( 'Chile', 'polylang' ),

	'cm'        => __( 'Cameroon', 'polylang' ),

	'cn'        => __( 'China', 'polylang' ),

	'co'        => __( 'Colombia', 'polylang' ),

	'cr'        => __( 'Costa Rica', 'polylang' ),

	'cu'        => __( 'Cuba', 'polylang' ),

	'cv'        => __( 'Cape Verde', 'polylang' ),

	'cx'        => __( 'Christmas Island', 'polylang' ),

	'cy'        => __( 'Cyprus', 'polylang' ),

	'cz'        => __( 'Czech Republic', 'polylang' ),

	'de'        => __( 'Germany', 'polylang' ),

	'dj'        => __( 'Djibouti', 'polylang' ),

	'dk'        => __( 'Denmark', 'polylang' ),

	'dm'        => __( 'Dominica', 'polylang' ),

	'do'        => __( 'Dominican Republic', 'polylang' ),

	'dz'        => __( 'Algeria', 'polylang' ),

	'ec'        => __( 'Ecuador', 'polylang' ),

	'ee'        => __( 'Estonia', 'polylang' ),

	'eg'        => __( 'Egypt', 'polylang' ),

	'eh'        => __( 'Western Sahara', 'polylang' ),

	'england'   => __( 'England', 'polylang' ),

	'er'        => __( 'Eritrea', 'polylang' ),

	'es'        => __( 'Spain', 'polylang' ),

	'esperanto' => __( 'Esperanto', 'polylang' ),

	'et'        => __( 'Ethiopia', 'polylang' ),

	'fi'        => __( 'Finland', 'polylang' ),

	'fj'        => __( 'Fiji', 'polylang' ),

	'fk'        => __( 'Falkland Islands', 'polylang' ),

	'fm'        => __( 'Micronesia', 'polylang' ),

	'fo'        => __( 'Faroe Islands', 'polylang' ),

	'fr'        => __( 'France', 'polylang' ),

	'ga'        => __( 'Gabon', 'polylang' ),

	'galicia'   => __( 'Galicia', 'polylang' ),

	'gb'        => __( 'United Kingdom', 'polylang' ),

	'gd'        => __( 'Grenada', 'polylang' ),

	'ge'        => __( 'Georgia', 'polylang' ),

	'gh'        => __( 'Ghana', 'polylang' ),

	'gi'        => __( 'Gibraltar', 'polylang' ),

	'gl'        => __( 'Greenland', 'polylang' ),

	'gm'        => __( 'Gambia', 'polylang' ),

	'gn'        => __( 'Guinea', 'polylang' ),

	'gp'        => __( 'Guadeloupe', 'polylang' ),

	'gq'        => __( 'Equatorial Guinea', 'polylang' ),

	'gr'        => __( 'Greece', 'polylang' ),

	'gs'        => __( 'South Georgia and the South Sandwich Islands', 'polylang' ),

	'gt'        => __( 'Guatemala', 'polylang' ),

	'gu'        => __( 'Guam', 'polylang' ),

	'gw'        => __( 'Guinea-Bissau', 'polylang' ),

	'gy'        => __( 'Guyana', 'polylang' ),

	'hk'        => __( 'Hong Kong', 'polylang' ),

	'hm'        => __( 'Heard Island and McDonald Islands', 'polylang' ),

	'hn'        => __( 'Honduras', 'polylang' ),

	'hr'        => __( 'Croatia', 'polylang' ),

	'ht'        => __( 'Haiti', 'polylang' ),

	'hu'        => __( 'Hungary', 'polylang' ),

	'id'        => __( 'Indonesia', 'polylang' ),

	'ie'        => __( 'Republic of Ireland', 'polylang' ),

	'il'        => __( 'Israel', 'polylang' ),

	'in'        => __( 'India', 'polylang' ),

	'io'        => __( 'British Indian Ocean Territory', 'polylang' ),

	'iq'        => __( 'Iraq', 'polylang' ),

	'ir'        => __( 'Iran', 'polylang' ),

	'is'        => __( 'Iceland', 'polylang' ),

	'it'        => __( 'Italy', 'polylang' ),

	'jm'        => __( 'Jamaica', 'polylang' ),

	'jo'        => __( 'Jordan', 'polylang' ),

	'jp'        => __( 'Japan', 'polylang' ),

	'ke'        => __( 'Kenya', 'polylang' ),

	'kg'        => __( 'Kyrgyzstan', 'polylang' ),

	'kh'        => __( 'Cambodia', 'polylang' ),

	'ki'        => __( 'Kiribati', 'polylang' ),

	'km'        => __( 'Comoros', 'polylang' ),

	'kn'        => __( 'Saint Kitts and Nevis', 'polylang' ),

	'kp'        => __( 'North Korea', 'polylang' ),

	'kr'        => __( 'South Korea', 'polylang' ),

	'kurdistan' => __( 'Kurdistan', 'polylang' ),

	'kw'        => __( 'Kuwait', 'polylang' ),

	'ky'        => __( 'Cayman Islands', 'polylang' ),

	'kz'        => __( 'Kazakhstan', 'polylang' ),

	'la'        => __( 'Laos', 'polylang' ),

	'lb'        => __( 'Lebanon', 'polylang' ),

	'lc'        => __( 'Saint Lucia', 'polylang' ),

	'li'        => __( 'Liechtenstein', 'polylang' ),

	'lk'        => __( 'Sri Lanka', 'polylang' ),

	'lr'        => __( 'Liberia', 'polylang' ),

	'ls'        => __( 'Lesotho', 'polylang' ),

	'lt'        => __( 'Lithuania', 'polylang' ),

	'lu'        => __( 'Luxembourg', 'polylang' ),

	'lv'        => __( 'Latvia', 'polylang' ),

	'ly'        => __( 'Libya', 'polylang' ),

	'ma'        => __( 'Morocco', 'polylang' ),

	'mc'        => __( 'Monaco', 'polylang' ),

	'md'        => __( 'Moldova', 'polylang' ),

	'me'        => __( 'Montenegro', 'polylang' ),

	'mg'        => __( 'Madagascar', 'polylang' ),

	'mh'        => __( 'Marshall Islands', 'polylang' ),

	'mk'        => __( 'North Macedonia', 'polylang' ),

	'ml'        => __( 'Mali', 'polylang' ),

	'mm'        => __( 'Myanmar', 'polylang' ),

	'mn'        => __( 'Mongolia', 'polylang' ),

	'mo'        => __( 'Macao', 'polylang' ),

	'mp'        => __( 'Northern Mariana Islands', 'polylang' ),

	'mq'        => __( 'Martinique', 'polylang' ),

	'mr'        => __( 'Mauritania', 'polylang' ),

	'ms'        => __( 'Montserrat', 'polylang' ),

	'mt'        => __( 'Malta', 'polylang' ),

	'mu'        => __( 'Mauritius', 'polylang' ),

	'mv'        => __( 'Maldives', 'polylang' ),

	'mw'        => __( 'Malawi', 'polylang' ),

	'mx'        => __( 'Mexico', 'polylang' ),

	'my'        => __( 'Malaysia', 'polylang' ),

	'mz'        => __( 'Mozambique', 'polylang' ),

	'na'        => __( 'Namibia', 'polylang' ),

	'nc'        => __( 'New Caledonia', 'polylang' ),

	'ne'        => __( 'Niger', 'polylang' ),

	'nf'        => __( 'Norfolk Island', 'polylang' ),

	'ng'        => __( 'Nigeria', 'polylang' ),

	'ni'        => __( 'Nicaragua', 'polylang' ),

	'nl'        => __( 'Netherlands', 'polylang' ),

	'no'        => __( 'Norway', 'polylang' ),

	'np'        => __( 'Nepal', 'polylang' ),

	'nr'        => __( 'Nauru', 'polylang' ),

	'nu'        => __( 'Niue', 'polylang' ),

	'nz'        => __( 'New Zealand', 'polylang' ),

	'occitania' => __( 'Occitania', 'polylang' ),

	'om'        => __( 'Oman', 'polylang' ),

	'pa'        => __( 'Panama', 'polylang' ),

	'pe'        => __( 'Peru', 'polylang' ),

	'pf'        => __( 'French Polynesia', 'polylang' ),

	'pg'        => __( 'Papua New Guinea', 'polylang' ),

	'ph'        => __( 'Philippines', 'polylang' ),

	'pk'        => __( 'Pakistan', 'polylang' ),

	'pl'        => __( 'Poland', 'polylang' ),

	'pm'        => __( 'Saint Pierre and Miquelon', 'polylang' ),

	'pn'        => __( 'Pitcairn', 'polylang' ),

	'pr'        => __( 'Puerto Rico', 'polylang' ),

	'ps'        => __( 'Palestinian Territory', 'polylang' ),

	'pt'        => __( 'Portugal', 'polylang' ),

	'pw'        => __( 'Belau', 'polylang' ),

	'py'        => __( 'Paraguay', 'polylang' ),

	'qa'        => __( 'Qatar', 'polylang' ),

	'quebec'    => __( 'Quebec', 'polylang' ),

	'ro'        => __( 'Romania', 'polylang' ),

	'rs'        => __( 'Serbia', 'polylang' ),

	'ru'        => __( 'Russia', 'polylang' ),

	'rw'        => __( 'Rwanda', 'polylang' ),

	'sa'        => __( 'Saudi Arabia', 'polylang' ),

	'sb'        => __( 'Solomon Islands', 'polylang' ),

	'sc'        => __( 'Seychelles', 'polylang' ),

	'scotland'  => __( 'Scotland', 'polylang' ),

	'sd'        => __( 'Sudan', 'polylang' ),

	'se'        => __( 'Sweden', 'polylang' ),

	'sg'        => __( 'Singapore', 'polylang' ),

	'sh'        => __( 'Saint Helena', 'polylang' ),

	'si'        => __( 'Slovenia', 'polylang' ),

	'sk'        => __( 'Slovakia', 'polylang' ),

	'sl'        => __( 'Sierra Leone', 'polylang' ),

	'sm'        => __( 'San Marino', 'polylang' ),

	'sn'        => __( 'Senegal', 'polylang' ),

	'so'        => __( 'Somalia', 'polylang' ),

	'sr'        => __( 'Suriname', 'polylang' ),

	'ss'        => __( 'South Sudan', 'polylang' ),

	'st'        => __( 'São Tomé and Príncipe', 'polylang' ),

	'sv'        => __( 'El Salvador', 'polylang' ),

	'sy'        => __( 'Syria', 'polylang' ),

	'sz'        => __( 'Swaziland', 'polylang' ),

	'tc'        => __( 'Turks and Caicos Islands', 'polylang' ),

	'td'        => __( 'Chad', 'polylang' ),

	'tf'        => __( 'French Southern Territories', 'polylang' ),

	'tg'        => __( 'Togo', 'polylang' ),

	'th'        => __( 'Thailand', 'polylang' ),

	'tibet'     => __( 'Tibet', 'polylang' ),

	'tj'        => __( 'Tajikistan', 'polylang' ),

	'tk'        => __( 'Tokelau', 'polylang' ),

	'tl'        => __( 'Timor-Leste', 'polylang' ),

	'tm'        => __( 'Turkmenistan', 'polylang' ),

	'tn'        => __( 'Tunisia', 'polylang' ),

	'to'        => __( 'Tonga', 'polylang' ),

	'tr'        => __( 'Turkey', 'polylang' ),

	'tt'        => __( 'Trinidad and Tobago', 'polylang' ),

	'tv'        => __( 'Tuvalu', 'polylang' ),

	'tw'        => __( 'Taiwan', 'polylang' ),

	'tz'        => __( 'Tanzania', 'polylang' ),

	'ua'        => __( 'Ukraine', 'polylang' ),

	'ug'        => __( 'Uganda', 'polylang' ),

	'us'        => __( 'United States', 'polylang' ),

	'uy'        => __( 'Uruguay', 'polylang' ),

	'uz'        => __( 'Uzbekistan', 'polylang' ),

	'va'        => __( 'Vatican', 'polylang' ),

	'vc'        => __( 'Saint Vincent and the Grenadines', 'polylang' ),

	've'        => __( 'Venezuela', 'polylang' ),

	'veneto'    => __( 'Veneto', 'polylang' ),

	'vg'        => __( 'British Virgin Islands', 'polylang' ),

	'vi'        => __( 'United States Virgin Islands', 'polylang' ),

	'vn'        => __( 'Vietnam', 'polylang' ),

	'vu'        => __( 'Vanuatu', 'polylang' ),

	'wales'     => __( 'Wales', 'polylang' ),

	'wf'        => __( 'Wallis and Futuna', 'polylang' ),

	'ws'        => __( 'Western Samoa', 'polylang' ),

	'ye'        => __( 'Yemen', 'polylang' ),

	'yt'        => __( 'Mayotte', 'polylang' ),

	'za'        => __( 'South Africa', 'polylang' ),

	'zm'        => __( 'Zambia', 'polylang' ),

	'zw'        => __( 'Zimbabwe', 'polylang' ),

);



/**

 * Filter the list of predefined flags

 *

 * @since 1.8

 *

 * @param array $flags

 */

return apply_filters( 'pll_predefined_flags', $flags );

