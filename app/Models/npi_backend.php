<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class npi_backend extends Model
{
    use HasFactory;

    // https://npiregistry.cms.hhs.gov/api/?version=2.1&number&first_name=GREG&last_name=PARKIN&city&state=UT&postal_code=&limit=50&skip


}

//
//$postData = array(
//    "number" => "",
//    "taxonomy_description" => "",
//    "first_name" => "",
//    "last_name" => "Parkin",
//    "city" => "",
//    "state" => "",
//    "postal_code" => "",
//    "limit" => "50",
//    "skip" => ""
//);
//
//function rest_call($method, $url, $data = false, $contentType = false, $token = false)
//{
//    $curl = curl_init();
//
//    if ($token) { //Add Bearer Token header in the request
//        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//            'Authorization: ' . $token
//        ));
//    }
//
//    switch ($method) {
//        case "POST":
//            curl_setopt($curl, CURLOPT_POST, 1);
//            if ($data) {
//                if ($contentType) {
//                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//                        'Content-Type: ' . $contentType
//                    ));
//                }
//
//                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//            }
//            break;
//
//        case "PUT":
//            curl_setopt($curl, CURLOPT_PUT, 1);
//            break;
//
//        default:
//            if ($data)
//                $url = sprintf("%s?%s", $url, http_build_query($data));
//    }
//
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//
//    $result = curl_exec($curl);
//
//    curl_close($curl);
//
//    return $result;
//}
//
//$string = http_build_query($postData);
//$url = 'https://npiregistry.cms.hhs.gov/api/';
//$jsonResponse = rest_call("POST", $url, $string, 'application/x-www-form-urlencoded');
//echo json_decode($jsonResponse);

// function rest_call($method, $url, $data = false, $contentType= false, $token = false)


//# This is the API demo
//https://npiregistry.cms.hhs.gov/demo-api
//
//# Search: number **
//# Exactly 10 digits
//https://npiregistry.cms.hhs.gov/api/?number=4536789025&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: enumeration_type
//# NPI-1 or NPI-2 (Other criteria required)
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=1&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: taxonomy_description **
//# Exact Description or Exact Specialty or wildcard * after 2 characters
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=233&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: first_name **
//# Exact name, or wildcard * after 2 characters	Use for type 1
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=Greg&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: use_first_name_alias
//# True or False (Other criteria required)	Use for type 1 First Name Search
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=1&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: last_name **
//# Exact name, or wildcard * after 2 characters	Use for type 1
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=Parkin&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: organization_name
//# Exact name, or wildcard * after 2 characters	Use for type 2
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=DJ&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: address_purpose
//# LOCATION, MAILING, PRIMARY or SECONDARY. (Other criteria required)
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=LOCATION&city=&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: city **
//# Exact city, or wildcard * after 2 characters
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=West Point&state=&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: state **
//# 2 Characters (Other criteria required)
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=UT&postal_code=&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: postal_code **
//# Exact Postal Code (5 digits will also return 9 digit zip + 4), or wildcard * after 2 characters
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=84015&country_code=&limit=&skip=&pretty=&version=2.1
//
//# Search: country_code
//# Exactly 2 characters (if "US", other criteria required)
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=US&limit=&skip=&pretty=&version=2.1
//
//# Search: limit **
//# Limit results, default = 10, max = 200
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=50&skip=&pretty=&version=2.1
//
//# Search: skip **
//# Skip first N results, max = 1000 (This is how you scroll forwards and backwards)
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=10&pretty=&version=2.1
//
//# Search: pretty
//# Response will be formatted with indented lines
//https://npiregistry.cms.hhs.gov/api/?number=&enumeration_type=&taxonomy_description=&first_name=&use_first_name_alias=&last_name=&organization_name=&address_purpose=&city=&state=&postal_code=&country_code=&limit=&skip=10&pretty=on&version=2.1
//
//
//
//
//
