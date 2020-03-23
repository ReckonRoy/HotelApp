/**
 * @author Le-Roy Jongwe
 * @Date 2020/03/23
 * @Time 00:04
 */

function validate(form)
{
	fail = validateName(form.name.value);
	fail += validateSurname(form.surname.value);
	fail += validateEmail(form.email.value);
	
	if( fail == "")
		{
		return true;
		}
	else
	{
		alert(fail);
		return false;
	}
}

function validateName(field)
{
	if(field == "")
		{
			return "No Name was entered.\n";
		}
	else
	{
		return "";
	}
	
}

function validateSurname(field)
{
	if(field == "")
		{
			return "No Surname was entered.\n";
		}
	else
		{
			return "";
		}
}

function validateEmail(field)
{
	if (field == "") return "No Email was entered.\n"
		else if (!((field.indexOf(".") > 0) &&
				(field.indexOf("@") > 0)) ||
				/[^a-zA-Z0-9.@_-]/.test(field))
				return "The Email address is invalid.\n"
			
			return ""
}