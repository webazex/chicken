<?php

/**

 * @package Polylang

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Don't access directly

};



/**

 * The list of predefined languages

 * For WordPress locales, see https://translate.wordpress.org/

 * For W3C locales, see http://www.iana.org/assignments/language-subtag-registry/language-subtag-registry

 * See also #33511

 * Facebook locales used to be available at https://www.facebook.com/translations/FacebookLocales.xml

 *

 * For each language:

 * [code]     => ISO 639-1 language code

 * [locale]   => WordPress locale

 * [name]     => name

 * [dir]      => text direction

 * [flag]     => flag code

 * [w3c]      => W3C locale

 * [facebook] => Facebook locale

 *

 * Facebook locales without equivalent WordPress locale:

 * 'ay_BO' (Aymara)

 * 'bp_IN' (Bhojpuri)

 * 'ck_US' (Cherokee)

 * 'en_IN' (English India)

 * 'gx_GR' (Classical Greek)

 * 'ig_NG' (Igbo)

 * 'ik_US' (Inupiak)

 * 'iu_CA' (Inuktitut)

 * 'ja_KS' (Japanese Kansai)

 * 'ks_IN' (Cachemiri)

 * 'lg_UG' (Ganda)

 * 'nd_ZW' (Ndebele)

 * 'nr_ZA' (Southern Ndebele)

 * 'ns_ZA' (Northern Sotho)

 * 'ny_MW' (Chewa)

 * 'qc_GT' (Quiché)

 * 'qu_PE' (Quechua)

 * 'se_NO' (Northern Sami)

 * 'ss_SZ' (Swazi)

 * 'st_ZA' (Southern Sotho)

 * 'tl_ST' (Klingon)

 * 'tn_BW' (Tswana)

 * 'ts_ZA' (Tsonga)

 * 've_ZA' (Venda)

 * 'wo_SN' (Wolof)

 * 'yi_DE' (Yiddish)

 * 'zu_ZA' (Zulu)

 * 'zz_TR' (Zazaki)

 */

return array(

	'af' => array(

		'code'     => 'af',

		'locale'   => 'af',

		'name'     => 'Afrikaans',

		'dir'      => 'ltr',

		'flag'     => 'za',

		'facebook' => 'af_ZA',

	),

	'ak' => array(

		'facebook' => 'ak_GH',

	),

	'am' => array(

		'facebook' => 'am_ET',

	),

	'ar' => array(

		'code'     => 'ar',

		'locale'   => 'ar',

		'name'     => 'العربية',

		'dir'      => 'rtl',

		'flag'     => 'arab',

		'facebook' => 'ar_AR',

	),

	'arq' => array(

		'facebook' => 'ar_AR',

	),

	'ary' => array(

		'code'     => 'ar',

		'locale'   => 'ary',

		'name'     => 'العربية المغربية',

		'dir'      => 'rtl',

		'flag'     => 'ma',

		'facebook' => 'ar_AR',

	),

	'as' => array(

		'code'     => 'as',

		'locale'   => 'as',

		'name'     => 'অসমীয়া',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'as_IN',

	),

	'az' => array(

		'code'     => 'az',

		'locale'   => 'az',

		'name'     => 'Azərbaycan',

		'dir'      => 'ltr',

		'flag'     => 'az',

		'facebook' => 'az_AZ',

	),

	'azb' => array(

		'code'     => 'az',

		'locale'   => 'azb',

		'name'     => 'گؤنئی آذربایجان',

		'dir'      => 'rtl',

		'flag'     => 'az',

	),

	'bel' => array(

		'code'     => 'be',

		'locale'   => 'bel',

		'name'     => 'Беларуская мова',

		'dir'      => 'ltr',

		'flag'     => 'by',

		'w3c'      => 'be',

		'facebook' => 'be_BY',

	),

	'bg_BG' => array(

		'code'     => 'bg',

		'locale'   => 'bg_BG',

		'name'     => 'български',

		'dir'      => 'ltr',

		'flag'     => 'bg',

		'facebook' => 'bg_BG',

	),

	'bn_BD' => array(

		'code'     => 'bn',

		'locale'   => 'bn_BD',

		'name'     => 'বাংলা',

		'dir'      => 'ltr',

		'flag'     => 'bd',

		'facebook' => 'bn_IN',

	),

	'bo' => array(

		'code'     => 'bo',

		'locale'   => 'bo',

		'name'     => 'བོད་ཡིག',

		'dir'      => 'ltr',

		'flag'     => 'tibet',

	),

	'bre' => array(

		'w3c'      => 'br',

		'facebook' => 'br_FR',

	),

	'bs_BA' => array(

		'code'     => 'bs',

		'locale'   => 'bs_BA',

		'name'     => 'Bosanski',

		'dir'      => 'ltr',

		'flag'     => 'ba',

		'facebook' => 'bs_BA',

	),

	'ca' => array(

		'code'     => 'ca',

		'locale'   => 'ca',

		'name'     => 'Català',

		'dir'      => 'ltr',

		'flag'     => 'catalonia',

		'facebook' => 'ca_ES',

	),

	'ceb' => array(

		'code'     => 'ceb',

		'locale'   => 'ceb',

		'name'     => 'Cebuano',

		'dir'      => 'ltr',

		'flag'     => 'ph',

		'facebook' => 'cx_PH',

	),

	'ckb' => array(

		'code'     => 'ku',

		'locale'   => 'ckb',

		'name'     => 'کوردی',

		'dir'      => 'rtl',

		'flag'     => 'kurdistan',

		'facebook' => 'cb_IQ',

	),

	'co' => array(

		'facebook' => 'co_FR',

	),

	'cs_CZ' => array(

		'code'     => 'cs',

		'locale'   => 'cs_CZ',

		'name'     => 'Čeština',

		'dir'      => 'ltr',

		'flag'     => 'cz',

		'facebook' => 'cs_CZ',

	),

	'cy' => array(

		'code'     => 'cy',

		'locale'   => 'cy',

		'name'     => 'Cymraeg',

		'dir'      => 'ltr',

		'flag'     => 'wales',

		'facebook' => 'cy_GB',

	),

	'da_DK' => array(

		'code'     => 'da',

		'locale'   => 'da_DK',

		'name'     => 'Dansk',

		'dir'      => 'ltr',

		'flag'     => 'dk',

		'facebook' => 'da_DK',

	),

	'de_AT' => array(

		'code'     => 'de',

		'locale'   => 'de_AT',

		'name'     => 'Deutsch',

		'dir'      => 'ltr',

		'flag'     => 'at',

		'facebook' => 'de_DE',

	),

	'de_CH' => array(

		'code'     => 'de',

		'locale'   => 'de_CH',

		'name'     => 'Deutsch',

		'dir'      => 'ltr',

		'flag'     => 'ch',

		'facebook' => 'de_DE',

	),

	'de_CH_informal' => array(

		'code'     => 'de',

		'locale'   => 'de_CH_informal',

		'name'     => 'Deutsch',

		'dir'      => 'ltr',

		'flag'     => 'ch',

		'w3c'      => 'de-CH',

		'facebook' => 'de_DE',

	),

	'de_DE' => array(

		'code'     => 'de',

		'locale'   => 'de_DE',

		'name'     => 'Deutsch',

		'dir'      => 'ltr',

		'flag'     => 'de',

		'facebook' => 'de_DE',

	),

	'de_DE_formal' => array(

		'code'     => 'de',

		'locale'   => 'de_DE_formal',

		'name'     => 'Deutsch',

		'dir'      => 'ltr',

		'flag'     => 'de',

		'w3c'      => 'de-DE',

		'facebook' => 'de_DE',

	),

	'dsb' => array(

		'code'     => 'dsb',

		'locale'   => 'dsb',

		'name'     => 'Dolnoserbšćina',

		'dir'      => 'ltr',

		'flag'     => 'de',

	),

	'dzo' => array(

		'code'     => 'dz',

		'locale'   => 'dzo',

		'name'     => 'རྫོང་ཁ',

		'dir'      => 'ltr',

		'flag'     => 'bt',

		'w3c'      => 'dz',

	),

	'el' => array(

		'code'     => 'el',

		'locale'   => 'el',

		'name'     => 'Ελληνικά',

		'dir'      => 'ltr',

		'flag'     => 'gr',

		'facebook' => 'el_GR',

	),

	'en_AU' => array(

		'code'     => 'en',

		'locale'   => 'en_AU',

		'name'     => 'English',

		'dir'      => 'ltr',

		'flag'     => 'au',

		'facebook' => 'en_US',

	),

	'en_CA' => array(

		'code'     => 'en',

		'locale'   => 'en_CA',

		'name'     => 'English',

		'dir'      => 'ltr',

		'flag'     => 'ca',

		'facebook' => 'en_US',

	),

	'en_GB' => array(

		'code'     => 'en',

		'locale'   => 'en_GB',

		'name'     => 'English',

		'dir'      => 'ltr',

		'flag'     => 'gb',

		'facebook' => 'en_GB',

	),

	'en_NZ' => array(

		'code'     => 'en',

		'locale'   => 'en_NZ',

		'name'     => 'English',

		'dir'      => 'ltr',

		'flag'     => 'nz',

		'facebook' => 'en_US',

	),

	'en_US' => array(

		'code'     => 'en',

		'locale'   => 'en_US',

		'name'     => 'English',

		'dir'      => 'ltr',

		'flag'     => 'us',

		'facebook' => 'en_US',

	),

	'en_ZA' => array(

		'code'     => 'en',

		'locale'   => 'en_ZA',

		'name'     => 'English',

		'dir'      => 'ltr',

		'flag'     => 'za',

		'facebook' => 'en_US',

	),

	'eo' => array(

		'code'     => 'eo',

		'locale'   => 'eo',

		'name'     => 'Esperanto',

		'dir'      => 'ltr',

		'flag'     => 'esperanto',

		'facebook' => 'eo_EO',

	),

	'es_AR' => array(

		'code'     => 'es',

		'locale'   => 'es_AR',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'ar',

		'facebook' => 'es_LA',

	),

	'es_CL' => array(

		'code'     => 'es',

		'locale'   => 'es_CL',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'cl',

		'facebook' => 'es_CL',

	),

	'es_CO' => array(

		'code'     => 'es',

		'locale'   => 'es_CO',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'co',

		'facebook' => 'es_CO',

	),

	'es_CR' => array(

		'code'     => 'es',

		'locale'   => 'es_CR',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'cr',

		'facebook' => 'es_LA',

	),

	'es_EC' => array(

		'code'     => 'es',

		'locale'   => 'es_EC',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'ec',

		'facebook' => 'es_LA',

	),

	'es_ES' => array(

		'code'     => 'es',

		'locale'   => 'es_ES',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'es',

		'facebook' => 'es_ES',

	),

	'es_GT' => array(

		'code'     => 'es',

		'locale'   => 'es_GT',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'gt',

		'facebook' => 'es_LA',

	),

	'es_MX' => array(

		'code'     => 'es',

		'locale'   => 'es_MX',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'mx',

		'facebook' => 'es_MX',

	),

	'es_PE' => array(

		'code'     => 'es',

		'locale'   => 'es_PE',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'pe',

		'facebook' => 'es_LA',

	),

	'es_PR' => array(

		'code'     => 'es',

		'locale'   => 'es_PR',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'pr',

		'facebook' => 'es_LA',

	),

	'es_UY' => array(

		'code'     => 'es',

		'locale'   => 'es_UY',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 'uy',

		'facebook' => 'es_LA',

	),

	'es_VE' => array(

		'code'     => 'es',

		'locale'   => 'es_VE',

		'name'     => 'Español',

		'dir'      => 'ltr',

		'flag'     => 've',

		'facebook' => 'es_VE',

	),

	'et' => array(

		'code'     => 'et',

		'locale'   => 'et',

		'name'     => 'Eesti',

		'dir'      => 'ltr',

		'flag'     => 'ee',

		'facebook' => 'et_EE',

	),

	'eu' => array(

		'code'     => 'eu',

		'locale'   => 'eu',

		'name'     => 'Euskara',

		'dir'      => 'ltr',

		'flag'     => 'basque',

		'facebook' => 'eu_ES',

	),

	'fa_AF' => array(

		'code'     => 'fa',

		'locale'   => 'fa_AF',

		'name'     => 'فارسی',

		'dir'      => 'rtl',

		'flag'     => 'af',

		'facebook' => 'fa_IR',

	),

	'fa_IR' => array(

		'code'     => 'fa',

		'locale'   => 'fa_IR',

		'name'     => 'فارسی',

		'dir'      => 'rtl',

		'flag'     => 'ir',

		'facebook' => 'fa_IR',

	),

	'fi' => array(

		'code'     => 'fi',

		'locale'   => 'fi',

		'name'     => 'Suomi',

		'dir'      => 'ltr',

		'flag'     => 'fi',

		'facebook' => 'fi_FI',

	),

	'fo' => array(

		'code'     => 'fo',

		'locale'   => 'fo',

		'name'     => 'Føroyskt',

		'dir'      => 'ltr',

		'flag'     => 'fo',

		'facebook' => 'fo_FO',

	),

	'fr_BE' => array(

		'code'     => 'fr',

		'locale'   => 'fr_BE',

		'name'     => 'Français',

		'dir'      => 'ltr',

		'flag'     => 'be',

		'facebook' => 'fr_FR',

	),

	'fr_CA' => array(

		'code'     => 'fr',

		'locale'   => 'fr_CA',

		'name'     => 'Français',

		'dir'      => 'ltr',

		'flag'     => 'quebec',

		'facebook' => 'fr_CA',

	),

	'fr_FR' => array(

		'code'     => 'fr',

		'locale'   => 'fr_FR',

		'name'     => 'Français',

		'dir'      => 'ltr',

		'flag'     => 'fr',

		'facebook' => 'fr_FR',

	),

	'fuc' => array(

		'facebook' => 'ff_NG',

	),

	'fur' => array(

		'code'     => 'fur',

		'locale'   => 'fur',

		'name'     => 'Furlan',

		'dir'      => 'ltr',

		'flag'     => 'it',

	),

	'fy' => array(

		'code'     => 'fy',

		'locale'   => 'fy',

		'name'     => 'Frysk',

		'dir'      => 'ltr',

		'flag'     => 'nl',

		'facebook' => 'fy_NL',

	),

	'ga' => array(

		'facebook' => 'ga_IE',

	),

	'gax' => array(

		'facebook' => 'om_ET',

	),

	'gd' => array(

		'code'     => 'gd',

		'locale'   => 'gd',

		'name'     => 'Gàidhlig',

		'dir'      => 'ltr',

		'flag'     => 'scotland',

	),

	'gl_ES' => array(

		'code'     => 'gl',

		'locale'   => 'gl_ES',

		'name'     => 'Galego',

		'dir'      => 'ltr',

		'flag'     => 'galicia',

		'facebook' => 'gl_ES',

	),

	'gn' => array(

		'facebook' => 'gn_PY',

	),

	'gu' => array(

		'code'     => 'gu',

		'locale'   => 'gu',

		'name'     => 'ગુજરાતી',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'gu_IN',

	),

	'hat' => array(

		'facebook' => 'ht_HT',

	),

	'hau' => array(

		'facebook' => 'ha_NG',

	),

	'haz' => array(

		'code'     => 'haz',

		'locale'   => 'haz',

		'name'     => 'هزاره گی',

		'dir'      => 'rtl',

		'flag'     => 'af',

	),

	'he_IL' => array(

		'code'     => 'he',

		'locale'   => 'he_IL',

		'name'     => 'עברית',

		'dir'      => 'rtl',

		'flag'     => 'il',

		'facebook' => 'he_IL',

	),

	'hi_IN' => array(

		'code'     => 'hi',

		'locale'   => 'hi_IN',

		'name'     => 'हिन्दी',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'hi_IN',

	),

	'hr' => array(

		'code'     => 'hr',

		'locale'   => 'hr',

		'name'     => 'Hrvatski',

		'dir'      => 'ltr',

		'flag'     => 'hr',

		'facebook' => 'hr_HR',

	),

	'hu_HU' => array(

		'code'     => 'hu',

		'locale'   => 'hu_HU',

		'name'     => 'Magyar',

		'dir'      => 'ltr',

		'flag'     => 'hu',

		'facebook' => 'hu_HU',

	),

	'hsb' => array(

		'code'     => 'hsb',

		'locale'   => 'hsb',

		'name'     => 'Hornjoserbšćina',

		'dir'      => 'ltr',

		'flag'     => 'de',

	),

	'hy' => array(

		'code'     => 'hy',

		'locale'   => 'hy',

		'name'     => 'Հայերեն',

		'dir'      => 'ltr',

		'flag'     => 'am',

		'facebook' => 'hy_AM',

	),

	'id_ID' => array(

		'code'     => 'id',

		'locale'   => 'id_ID',

		'name'     => 'Bahasa Indonesia',

		'dir'      => 'ltr',

		'flag'     => 'id',

		'facebook' => 'id_ID',

	),

	'ido' => array(

		'w3c'      => 'io',

	),

	'is_IS' => array(

		'code'     => 'is',

		'locale'   => 'is_IS',

		'name'     => 'Íslenska',

		'dir'      => 'ltr',

		'flag'     => 'is',

		'facebook' => 'is_IS',

	),

	'it_IT' => array(

		'code'     => 'it',

		'locale'   => 'it_IT',

		'name'     => 'Italiano',

		'dir'      => 'ltr',

		'flag'     => 'it',

		'facebook' => 'it_IT',

	),

	'ja' => array(

		'code'     => 'ja',

		'locale'   => 'ja',

		'name'     => '日本語',

		'dir'      => 'ltr',

		'flag'     => 'jp',

		'facebook' => 'ja_JP',

	),

	'jv_ID' => array(

		'code'     => 'jv',

		'locale'   => 'jv_ID',

		'name'     => 'Basa Jawa',

		'dir'      => 'ltr',

		'flag'     => 'id',

		'facebook' => 'jv_ID',

	),

	'ka_GE' => array(

		'code'     => 'ka',

		'locale'   => 'ka_GE',

		'name'     => 'ქართული',

		'dir'      => 'ltr',

		'flag'     => 'ge',

		'facebook' => 'ka_GE',

	),

	'kab' => array(

		'code'     => 'kab',

		'locale'   => 'kab',

		'name'     => 'Taqbaylit',

		'dir'      => 'ltr',

		'flag'     => 'dz',

	),

	'kin' => array(

		'w3c'      => 'rw',

		'facebook' => 'rw_RW',

	),

	'kk' => array(

		'code'     => 'kk',

		'locale'   => 'kk',

		'name'     => 'Қазақ тілі',

		'dir'      => 'ltr',

		'flag'     => 'kz',

		'facebook' => 'kk_KZ',

	),

	'km' => array(

		'code'     => 'km',

		'locale'   => 'km',

		'name'     => 'ភាសាខ្មែរ',

		'dir'      => 'ltr',

		'flag'     => 'kh',

		'facebook' => 'km_KH',

	),

	'kn' => array(

		'code'     => 'kn',

		'locale'   => 'kn',

		'name'     => 'ಕನ್ನಡ',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'kn_IN',

	),

	'ko_KR' => array(

		'code'     => 'ko',

		'locale'   => 'ko_KR',

		'name'     => '한국어',

		'dir'      => 'ltr',

		'flag'     => 'kr',

		'facebook' => 'ko_KR',

	),

	'ku' => array(

		'facebook' => 'ku_TR',

	),

	'ky_KY' => array(

		'facebook' => 'ky_KG',

	),

	'la' => array(

		'facebook' => 'la_VA',

	),

	'li' => array(

		'facebook' => 'li_NL',

	),

	'lin' => array(

		'facebook' => 'ln_CD',

	),

	'lo' => array(

		'code'     => 'lo',

		'locale'   => 'lo',

		'name'     => 'ພາສາລາວ',

		'dir'      => 'ltr',

		'flag'     => 'la',

		'facebook' => 'lo_LA',

	),

	'lt_LT' => array(

		'code'     => 'lt',

		'locale'   => 'lt_LT',

		'name'     => 'Lietuviškai',

		'dir'      => 'ltr',

		'flag'     => 'lt',

		'facebook' => 'lt_LT',

	),

	'lv' => array(

		'code'     => 'lv',

		'locale'   => 'lv',

		'name'     => 'Latviešu valoda',

		'dir'      => 'ltr',

		'flag'     => 'lv',

		'facebook' => 'lv_LV',

	),

	'mg_MG' => array(

		'facebook' => 'mg_MG',

	),

	'mk_MK' => array(

		'code'     => 'mk',

		'locale'   => 'mk_MK',

		'name'     => 'македонски јазик',

		'dir'      => 'ltr',

		'flag'     => 'mk',

		'facebook' => 'mk_MK',

	),

	'ml_IN' => array(

		'code'     => 'ml',

		'locale'   => 'ml_IN',

		'name'     => 'മലയാളം',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'ml_IN',

	),

	'mlt' => array(

		'facebook' => 'mt_MT',

	),

	'mn' => array(

		'code'     => 'mn',

		'locale'   => 'mn',

		'name'     => 'Монгол хэл',

		'dir'      => 'ltr',

		'flag'     => 'mn',

		'facebook' => 'mn_MN',

	),

	'mr' => array(

		'code'     => 'mr',

		'locale'   => 'mr',

		'name'     => 'मराठी',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'mr_IN',

	),

	'mri' => array(

		'w3c'      => 'mi',

		'facebook' => 'mi_NZ',

	),

	'ms_MY' => array(

		'code'     => 'ms',

		'locale'   => 'ms_MY',

		'name'     => 'Bahasa Melayu',

		'dir'      => 'ltr',

		'flag'     => 'my',

		'facebook' => 'ms_MY',

	),

	'my_MM' => array(

		'code'     => 'my',

		'locale'   => 'my_MM',

		'name'     => 'ဗမာစာ',

		'dir'      => 'ltr',

		'flag'     => 'mm',

		'facebook' => 'my_MM',

	),

	'nb_NO' => array(

		'code'     => 'nb',

		'locale'   => 'nb_NO',

		'name'     => 'Norsk Bokmål',

		'dir'      => 'ltr',

		'flag'     => 'no',

		'facebook' => 'nb_NO',

	),

	'ne_NP' => array(

		'code'     => 'ne',

		'locale'   => 'ne_NP',

		'name'     => 'नेपाली',

		'dir'      => 'ltr',

		'flag'     => 'np',

		'facebook' => 'ne_NP',

	),

	'nl_BE' => array(

		'code'     => 'nl',

		'locale'   => 'nl_BE',

		'name'     => 'Nederlands',

		'dir'      => 'ltr',

		'flag'     => 'be',

		'facebook' => 'nl_BE',

	),

	'nl_NL' => array(

		'code'     => 'nl',

		'locale'   => 'nl_NL',

		'name'     => 'Nederlands',

		'dir'      => 'ltr',

		'flag'     => 'nl',

		'facebook' => 'nl_NL',

	),

	'nl_NL_formal' => array(

		'code'     => 'nl',

		'locale'   => 'nl_NL_formal',

		'name'     => 'Nederlands',

		'dir'      => 'ltr',

		'flag'     => 'nl',

		'w3c'      => 'nl-NL',

		'facebook' => 'nl_NL',

	),

	'nn_NO' => array(

		'code'     => 'nn',

		'locale'   => 'nn_NO',

		'name'     => 'Norsk Nynorsk',

		'dir'      => 'ltr',

		'flag'     => 'no',

		'facebook' => 'nn_NO',

	),

	'oci' => array(

		'code'     => 'oc',

		'locale'   => 'oci',

		'name'     => 'Occitan',

		'dir'      => 'ltr',

		'flag'     => 'occitania',

		'w3c'      => 'oc',

	),

	'ory' => array(

		'facebook' => 'or_IN',

	),

	'pa_IN' => array(

		'code'     => 'pa',

		'locale'   => 'pa_IN',

		'name'     => 'ਪੰਜਾਬੀ',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'pa_IN',

	),

	'pl_PL' => array(

		'code'     => 'pl',

		'locale'   => 'pl_PL',

		'name'     => 'Polski',

		'dir'      => 'ltr',

		'flag'     => 'pl',

		'facebook' => 'pl_PL',

	),

	'ps' => array(

		'code'     => 'ps',

		'locale'   => 'ps',

		'name'     => 'پښتو',

		'dir'      => 'rtl',

		'flag'     => 'af',

		'facebook' => 'ps_AF',

	),

	'pt_AO' => array(

		'code'     => 'pt',

		'locale'   => 'pt_AO',

		'name'     => 'Português',

		'dir'      => 'ltr',

		'flag'     => 'ao',

		'facebook' => 'pt_PT',

	),

	'pt_BR' => array(

		'code'     => 'pt',

		'locale'   => 'pt_BR',

		'name'     => 'Português',

		'dir'      => 'ltr',

		'flag'     => 'br',

		'facebook' => 'pt_BR',

	),

	'pt_PT' => array(

		'code'     => 'pt',

		'locale'   => 'pt_PT',

		'name'     => 'Português',

		'dir'      => 'ltr',

		'flag'     => 'pt',

		'facebook' => 'pt_PT',

	),

	'pt_PT_ao90' => array(

		'code'     => 'pt',

		'locale'   => 'pt_PT_ao90',

		'name'     => 'Português',

		'dir'      => 'ltr',

		'flag'     => 'pt',

		'facebook' => 'pt_PT',

	),

	'rhg' => array(

		'code'     => 'rhg',

		'locale'   => 'rhg',

		'name'     => 'Ruáinga',

		'dir'      => 'ltr',

		'flag'     => 'mm',

	),

	'ro_RO' => array(

		'code'     => 'ro',

		'locale'   => 'ro_RO',

		'name'     => 'Română',

		'dir'      => 'ltr',

		'flag'     => 'ro',

		'facebook' => 'ro_RO',

	),

	'roh' => array(

		'w3c'      => 'rm',

		'facebook' => 'rm_CH',

	),

	'ru_RU' => array(

		'code'     => 'ru',

		'locale'   => 'ru_RU',

		'name'     => 'Русский',

		'dir'      => 'ltr',

		'flag'     => 'ru',

		'facebook' => 'ru_RU',

	),

	'sa_IN' => array(

		'facebook' => 'sa_IN',

	),

	'sah' => array(

		'code'     => 'sah',

		'locale'   => 'sah',

		'name'     => 'Сахалыы',

		'dir'      => 'ltr',

		'flag'     => 'ru',

	),

	'si_LK' => array(

		'code'     => 'si',

		'locale'   => 'si_LK',

		'name'     => 'සිංහල',

		'dir'      => 'ltr',

		'flag'     => 'lk',

		'facebook' => 'si_LK',

	),

	'sk_SK' => array(

		'code'     => 'sk',

		'locale'   => 'sk_SK',

		'name'     => 'Slovenčina',

		'dir'      => 'ltr',

		'flag'     => 'sk',

		'facebook' => 'sk_SK',

	),

	'skr' => array(

		'code'     => 'skr',

		'locale'   => 'skr',

		'name'     => 'سرائیکی',

		'dir'      => 'rtl',

		'flag'     => 'pk',

	),

	'sl_SI' => array(

		'code'     => 'sl',

		'locale'   => 'sl_SI',

		'name'     => 'Slovenščina',

		'dir'      => 'ltr',

		'flag'     => 'si',

		'facebook' => 'sl_SI',

	),

	'sna' => array(

		'facebook' => 'sn_ZW',

	),

	'snd' => array(

		'code'     => 'sd',

		'locale'   => 'snd',

		'name'     => 'سنڌي',

		'dir'      => 'rtl',

		'flag'     => 'pk',

	),

	'so_SO' => array(

		'code'     => 'so',

		'locale'   => 'so_SO',

		'name'     => 'Af-Soomaali',

		'dir'      => 'ltr',

		'flag'     => 'so',

		'facebook' => 'so_SO',

	),

	'sq' => array(

		'code'     => 'sq',

		'locale'   => 'sq',

		'name'     => 'Shqip',

		'dir'      => 'ltr',

		'flag'     => 'al',

		'facebook' => 'sq_AL',

	),

	'sr_RS' => array(

		'code'     => 'sr',

		'locale'   => 'sr_RS',

		'name'     => 'Српски језик',

		'dir'      => 'ltr',

		'flag'     => 'rs',

		'facebook' => 'sr_RS',

	),

	'srd' => array(

		'w3c'      => 'sc',

		'facebook' => 'sc_IT',

	),

	'su_ID' => array(

		'code'     => 'su',

		'locale'   => 'su_ID',

		'name'     => 'Basa Sunda',

		'dir'      => 'ltr',

		'flag'     => 'id',

		'facebook' => 'su_ID',

	),

	'sv_SE' => array(

		'code'     => 'sv',

		'locale'   => 'sv_SE',

		'name'     => 'Svenska',

		'dir'      => 'ltr',

		'flag'     => 'se',

		'facebook' => 'sv_SE',

	),

	'sw' => array(

		'code'     => 'sw',

		'locale'   => 'sw',

		'name'     => 'Kiswahili',

		'dir'      => 'ltr',

		'flag'     => 'ke',

		'facebook' => 'sw_KE',

	),

	'syr' => array(

		'facebook' => 'sy_SY',

	),

	'szl' => array(

		'code'     => 'szl',

		'locale'   => 'szl',

		'name'     => 'Ślōnskŏ gŏdka',

		'dir'      => 'ltr',

		'flag'     => 'pl',

		'facebook' => 'sz_PL',

	),

	'ta_IN' => array(

		'code'     => 'ta',

		'locale'   => 'ta_IN',

		'name'     => 'தமிழ்',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'ta_IN',

	),

	'ta_LK' => array(

		'code'     => 'ta',

		'locale'   => 'ta_LK',

		'name'     => 'தமிழ்',

		'dir'      => 'ltr',

		'flag'     => 'lk',

		'facebook' => 'ta_IN',

	),

	'tah' => array(

		'code'     => 'ty',

		'locale'   => 'tah',

		'name'     => 'Reo Tahiti',

		'dir'      => 'ltr',

		'flag'     => 'pf',

	),

	'te' => array(

		'code'     => 'te',

		'locale'   => 'te',

		'name'     => 'తెలుగు',

		'dir'      => 'ltr',

		'flag'     => 'in',

		'facebook' => 'te_IN',

	),

	'tg' => array(

		'facebook' => 'tg_TJ',

	),

	'th' => array(

		'code'     => 'th',

		'locale'   => 'th',

		'name'     => 'ไทย',

		'dir'      => 'ltr',

		'flag'     => 'th',

		'facebook' => 'th_TH',

	),

	'tl' => array(

		'code'     => 'tl',

		'locale'   => 'tl',

		'name'     => 'Tagalog',

		'dir'      => 'ltr',

		'flag'     => 'ph',

		'facebook' => 'tl_PH',

	),

	'tr_TR' => array(

		'code'     => 'tr',

		'locale'   => 'tr_TR',

		'name'     => 'Türkçe',

		'dir'      => 'ltr',

		'flag'     => 'tr',

		'facebook' => 'tr_TR',

	),

	'tt_RU' => array(

		'code'     => 'tt',

		'locale'   => 'tt_RU',

		'name'     => 'Татар теле',

		'dir'      => 'ltr',

		'flag'     => 'ru',

		'facebook' => 'tt_RU',

	),

	'tuk' => array(

		'w3c'      => 'tk',

		'facebook' => 'tk_TM',

	),

	'tzm' => array(

		'facebook' => 'tz_MA',

	),

	'ug_CN' => array(

		'code'     => 'ug',

		'locale'   => 'ug_CN',

		'name'     => 'Uyƣurqə',

		'dir'      => 'ltr',

		'flag'     => 'cn',

	),

	'uk' => array(

		'code'     => 'uk',

		'locale'   => 'uk',

		'name'     => 'Українська',

		'dir'      => 'ltr',

		'flag'     => 'ua',

		'facebook' => 'uk_UA',

	),

	'ur' => array(

		'code'     => 'ur',

		'locale'   => 'ur',

		'name'     => 'اردو',

		'dir'      => 'rtl',

		'flag'     => 'pk',

		'facebook' => 'ur_PK',

	),

	'uz_UZ' => array(

		'code'     => 'uz',

		'locale'   => 'uz_UZ',

		'name'     => 'Oʻzbek',

		'dir'      => 'ltr',

		'flag'     => 'uz',

		'facebook' => 'uz_UZ',

	),

	'vec' => array(

		'code'     => 'vec',

		'locale'   => 'vec',

		'name'     => 'Vèneto',

		'dir'      => 'ltr',

		'flag'     => 'veneto',

	),

	'vi' => array(

		'code'     => 'vi',

		'locale'   => 'vi',

		'name'     => 'Tiếng Việt',

		'dir'      => 'ltr',

		'flag'     => 'vn',

		'facebook' => 'vi_VN',

	),

	'xho' => array(

		'facebook' => 'xh_ZA',

	),

	'yor' => array(

		'facebook' => 'yo_NG',

	),

	'zh_CN' => array(

		'code'     => 'zh',

		'locale'   => 'zh_CN',

		'name'     => '中文 (中国)',

		'dir'      => 'ltr',

		'flag'     => 'cn',

		'facebook' => 'zh_CN',

	),

	'zh_HK' => array(

		'code'     => 'zh',

		'locale'   => 'zh_HK',

		'name'     => '中文 (香港)',

		'dir'      => 'ltr',

		'flag'     => 'hk',

		'facebook' => 'zh_HK',

	),

	'zh_TW' => array(

		'code'     => 'zh',

		'locale'   => 'zh_TW',

		'name'     => '中文 (台灣)',

		'dir'      => 'ltr',

		'flag'     => 'tw',

		'facebook' => 'zh_TW',

	),

);

