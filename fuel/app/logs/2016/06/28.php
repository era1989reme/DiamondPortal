<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2016-06-28 05:16:39 --> Fatal Error - Call to undefined method Fuel\Core\Uri::wcreate() in /home/vrdvishw/public_html/demo/diamond/fuel/app/views/admin/leads/listing-rows.php on line 19
ERROR - 2016-06-28 05:25:05 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:25:52 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:25:55 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:25:58 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:31:18 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:46:22 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:47:09 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 05:48:01 --> Notice - Undefined variable: credit in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 195
ERROR - 2016-06-28 06:05:53 --> Parsing Error - syntax error, unexpected ')' in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 211
ERROR - 2016-06-28 06:06:22 --> 1054 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 't0.postcode' in 'where clause' with query: "SELECT `t0`.`id` AS `t0_c0`, `t0`.`username` AS `t0_c1`, `t0`.`password` AS `t0_c2`, `t0`.`group` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`last_login` AS `t0_c5`, `t0`.`login_hash` AS `t0_c6`, `t0`.`profile_fields` AS `t0_c7`, `t0`.`created_at` AS `t0_c8`, `t0`.`updated_at` AS `t0_c9`, `t0`.`credit` AS `t0_c10`, `t0`.`name` AS `t0_c11` FROM `users` AS `t0` WHERE `t0`.`postcode` = '123456' AND `t0`.`user_id` = '9'" in /home/vrdvishw/public_html/demo/diamond/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-06-28 06:07:04 --> Notice - Use of undefined constant Model_Postcode - assumed 'Model_Postcode' in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 200
ERROR - 2016-06-28 06:07:38 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'updated_at' cannot be null with query: "INSERT INTO `postcodes` (`user_id`, `postcode`, `created_at`, `updated_at`) VALUES ('9', '123456', 1467074258, null)" in /home/vrdvishw/public_html/demo/diamond/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-06-28 07:00:51 --> Fatal Error - Call to undefined method Fuel\Core\Uri::wcreate() in /home/vrdvishw/public_html/demo/diamond/fuel/app/views/admin/leads/listing-rows.php on line 19
ERROR - 2016-06-28 07:00:56 --> Fatal Error - Call to undefined method Fuel\Core\Uri::wcreate() in /home/vrdvishw/public_html/demo/diamond/fuel/app/views/admin/leads/listing-rows.php on line 19
ERROR - 2016-06-28 07:42:46 --> Fatal Error - Call to undefined method Fuel\Core\Uri::wcreate() in /home/vrdvishw/public_html/demo/diamond/fuel/app/views/admin/leads/listing-rows.php on line 19
ERROR - 2016-06-28 11:35:52 --> Fatal Error - Call to undefined method Fuel\Core\Uri::wcreate() in /home/vrdvishw/public_html/demo/diamond/fuel/app/views/admin/leads/listing-rows.php on line 19
ERROR - 2016-06-28 11:36:11 --> Fatal Error - Call to undefined method Fuel\Core\Uri::wcreate() in /home/vrdvishw/public_html/demo/diamond/fuel/app/views/admin/leads/listing-rows.php on line 19
ERROR - 2016-06-28 11:55:49 --> Notice - Undefined variable: postcode in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 230
ERROR - 2016-06-28 12:20:57 --> 1054 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 't0.user_id' in 'where clause' with query: "SELECT `t0`.`id` AS `t0_c0`, `t0`.`ring_type` AS `t0_c1`, `t0`.`budget` AS `t0_c2`, `t0`.`post_code` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`description` AS `t0_c5`, `t0`.`created_at` AS `t0_c6`, `t0`.`updated_at` AS `t0_c7` FROM `leads` AS `t0` WHERE `t0`.`user_id` = '9' AND `t0`.`postcode` NOT IN ('48912')" in /home/vrdvishw/public_html/demo/diamond/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-06-28 12:21:44 --> 1054 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 't0.user_id' in 'where clause' with query: "SELECT `t0`.`id` AS `t0_c0`, `t0`.`ring_type` AS `t0_c1`, `t0`.`budget` AS `t0_c2`, `t0`.`post_code` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`description` AS `t0_c5`, `t0`.`created_at` AS `t0_c6`, `t0`.`updated_at` AS `t0_c7` FROM `leads` AS `t0` WHERE `t0`.`user_id` = '9' AND `t0`.`postcode` NOT IN ('48912')" in /home/vrdvishw/public_html/demo/diamond/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-06-28 12:21:57 --> Fatal Error - Call to a member function delete() on a non-object in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 212
ERROR - 2016-06-28 12:24:28 --> Runtime Notice - Non-static method Orm\Model::delete() should not be called statically, assuming $this from incompatible context in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 211
ERROR - 2016-06-28 12:24:47 --> Notice - Array to string conversion in /home/vrdvishw/public_html/demo/diamond/fuel/packages/orm/classes/model.php on line 276
ERROR - 2016-06-28 12:25:06 --> Fatal Error - Call to a member function delete() on a non-object in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 212
ERROR - 2016-06-28 12:26:37 --> Error - Call to undefined method Model_Postcode::where() in /home/vrdvishw/public_html/demo/diamond/fuel/packages/orm/classes/model.php on line 1074
ERROR - 2016-06-28 12:28:28 --> Notice - Undefined variable: query in /home/vrdvishw/public_html/demo/diamond/fuel/app/classes/controller/admin/jewellers.php on line 216
