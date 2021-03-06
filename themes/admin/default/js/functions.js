function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; path=/; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function mobilecheck() {
	var check = false;
	(function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
	return check;
}

function alert_error(id, content)
{
	$(id).html('<div class="alert alert-dismissable alert-danger">'+
	'<div type="div" class="close" data-dismiss="alert">×</div>'+content+'</div>');
}

function alert_success(id, content)
{
	$(id).html('<div class="alert alert-dismissable alert-success">'+
	'<div type="div" class="close" data-dismiss="alert">×</div>'+content+'</div>');
}

function alert_info(id, content)
{
	$(id).html('<div class="alert alert-dismissable alert-info">'+
	'<div type="div" class="close" data-dismiss="alert">×</div>'+content+'</div>');
}

function alert_warning(id, content)
{
	$(id).html('<div class="alert alert-dismissable alert-warning">'+
	'<div type="div" class="close" data-dismiss="alert">×</div>'+content+'</div>');
}

function error_filter(type, id, content)
{
	if(type=="error")
	{
		alert_error(id, content);
	}else if(type=="success")
	{
		alert_success(id, content);
	}else if(type=="info")
	{
		alert_info(id, content);
	}else if(type=="warning"){
		alert_warning(id, content);
	}
}

function redir(url)
{
    window.location.replace(url);
}

function ajax_post(formid, showid, checkredir, redirurl, islogin)
{
	newform = '#'+formid;
	newshow = '#'+showid;
	$(newshow).html('<img src="'+app_theme+'/img/loading.gif" />');
	var form_values = $( newform ).serialize();
	action = document.getElementById(formid).action;
	$.ajax({
        url : action,
        type: "POST",
        data : form_values,
        success: function(data, textStatus, jqXHR)
        {
			var error = data["error"];
			var message = data["message"];
			var errortype = data["type"];
			error_filter(errortype, newshow, message);
			var offsets = $(newshow).offset();
			var top = offsets.top;
			 $('html,body').animate({scrollTop: top-80}, 1000);
			if(errortype=="success" && checkredir == 1)
			{
				if(redirurl=="")
                {
                    redir(document.referrer);
                }
                else
                {
                    redir(redirurl);
                }
			}
			if(islogin && errortype=="error")
			{
				classie.toggle( document.getElementById('update-loginclass'), 'error-login' );
				window.setTimeout(function(){
					classie.toggle( document.getElementById('update-loginclass'), 'error-login' );
				}, 3000);
			}
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
			alert_error(newshow, app_network_error);
        }
	});
}

function del(id, table, formid)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
		$.ajax({
			url : app_delurl,
			type: "POST",
			data : "del="+table+"&id="+id,
			success: function(data, textStatus, jqXHR)
			{
				type    = data["type"];
				message = data["message"];
				if(type=="success")
				{
					$.Notify.show(message, app_notify_success);
					document.getElementById(formid).style.cssText = 'display: none !important;';
				}
				else
				{
					$.Notify.show(message, app_notify_error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				$.Notify.show(app_network_error, app_notify_error);
			}
		});
	}
}

function change_status(id, table, formid)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
		$.ajax({
			url : app_status_change,
			type: "POST",
			data : "set="+table+"&id="+id,
			success: function(data, textStatus, jqXHR)
			{
				type    = data["type"];
				message = data["message"];
				if(type=="success")
				{
					$.Notify.show("Updated", app_notify_success);
					btn = document.getElementById(formid);
					btn.innerHTML = message;
				}
				else
				{
					$.Notify.show(message, app_notify_error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				$.Notify.show(app_network_error, app_notify_error);
			}
		});
	}
}

function user_type(id,  formid)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
        var duration = $('#duration_number').val();
        var durationk = $('#duration_kind').val();
		$.ajax({
			url : app_upgrade_account,
			type: "POST",
			data : "&user_id="+id+"&duration="+duration+"&durtype="+durationk,
			success: function(data, textStatus, jqXHR)
			{
				type    = data["type"];
				message = data["message"];
				if(type=="success")
				{
					$.Notify.show("Updated", app_notify_success);
					btn = document.getElementById(formid);
					btn.innerHTML = message;
                    if(message == "Upgrade Account")
                    {
                        $('#change_duration').show();
                    }
                    else
                    {
                        $('#change_duration').hide();
                    }
				}
				else
				{
					$.Notify.show(message, app_notify_error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				$.Notify.show(app_network_error, app_notify_error);
			}
		});
	}
}

function activate(id, table, formid)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
		$.ajax({
			url : app_confirm_url,
			type: "POST",
			data : "set="+table+"&id="+id,
			success: function(data, textStatus, jqXHR)
			{
				type    = data["type"];
				message = data["message"];
				if(type=="success")
				{
					$.Notify.show(message, app_notify_success);
					btn = document.getElementById(formid);
					btn.innerHTML = message;
				}
				else
				{
					$.Notify.show(message, app_notify_error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				$.Notify.show(app_network_error, app_notify_error);
			}
		});
	}
}

function currency_update(code, post_url)
{
		var nameid  = "#currency_"+code+"_name";
		var valueid = "#currency_"+code+"_value";
	    var name    = $(nameid).val();
		var value   = $(valueid).val();
		$.ajax({
			url : post_url,
			type: "POST",
			data : "currency_code="+code+"&currency_name="+name+"&currency_value="+value,
			success: function(data, textStatus, jqXHR)
			{
				type    = data["type"];
				message = data["message"];
				if(type=="success")
				{
					$.Notify.show(message, app_notify_success);
				}
				else
				{
					$.Notify.show(message, app_notify_error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				$.Notify.show(app_network_error, app_notify_error);
			}
		});
}

function currency_delete(code, post_url)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
		$.ajax({
			url : post_url,
			type: "POST",
			data : "currency_code="+code,
			success: function(data, textStatus, jqXHR)
			{
				type    = data["type"];
				message = data["message"];
				if(type=="success")
				{
					$.Notify.show(message, app_notify_success);
					var hideid = '#currency_'+code;
					$(hideid).hide();
				}
				else
				{
					$.Notify.show(message, app_notify_error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				$.Notify.show(app_network_error, app_notify_error);
			}
		});
	}
}