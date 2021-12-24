<?php
/*$router->get("","PagesController@home");
$router->get("about","PagesController@about");
$router->get("Information","PagesController@Information");
$router->get("users","UsersController@index");
$router->get("Sources", "PagesController@Sources");
$router->get("MyBlogWall","PagesController@MyMainWall");
$router->get("PostCreate","PostController@PostCreate");
$router->get("PostEdit","PostController@PostEdit");
$router->get("EditThisPost","PostController@EditThisPost");

$router->post("SaveEditedPost","PostController@SaveChanges");
$router->post("PostCreate","PostController@PostBlog");
$router->post("users","UsersController@store");

$router->get("ViewAllSchools", "PagesController@ViewAll");
$router->get("SchoolDeleteSelect", "PagesController@ChooseDelete");
$router->get("EditSchool","PostController@EditSchool");
$router->get("SchoolEditSelect","PagesController@EditSelect");
$router->get("AddNewSchool", "PagesController@ViewNewSchoolCreate");

$router->post("SaveSchool","PostController@SaveSchoolChanges");
$router->post("DeleteSchool", "PostController@DeleteSchool");
$router->post("SubmitSchool", "PostController@SubmitNewSchool");
*/

//here down will be the new routes I will be actually using
$router->get("","PagesController@home");
$router->get("UserHome", "PagesController@UserHome");