class Users{
  constructor(id, name) {
    this.us_id = id;
    this.us_name = name;
 }
}
var user;
var if_user = false;
function add_user(id,name)
{
	user = new Users(id,name);
	if_user = true;
}
function user_id()
{
	return user.us_id;
}
function user_name()
{
	return user.us_name;
}
function destroy()
{
	delete user;
}