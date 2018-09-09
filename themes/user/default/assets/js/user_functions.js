function edit_website(id, urlpost)
{
	$('#Edit_Website').modal('show');
	$("#edit_website_content").html('<center><img src="'+app_theme+'/assets/img/loading.gif" /></center>');
	
	$.ajax({
        url : urlpost,
        type: "POST",
        data : "loadid="+id,
        success: function(data, textStatus, jqXHR)
        {
			var error = data["error"];
			var message = data["message"];
			var errortype = data["type"];
			$("#edit_website_content").html(message);
			range_ready_update();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
			alert_error("#edit_website_content", app_network_error);
        }
	});
}

function delete_website(id, urlpost, fid)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
		$.ajax({
			url : urlpost,
			type: "POST",
			data : "delid="+id,
			success: function(data, textStatus, jqXHR)
			{
				var error = data["error"];
				var message = data["message"];
				var errortype = data["type"];
				if(errortype == "success")
				{
					fid = "#"+fid;
					$(fid).hide();
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				//
			}
		});
	}
}


function delete_session(id, urlpost, fid)
{
	var check = confirm("Are you sure ?");
	if (check == true) {
		$.ajax({
			url : urlpost,
			type: "POST",
			data : "delid="+id,
			success: function(data, textStatus, jqXHR)
			{
				var error = data["error"];
				var message = data["message"];
				var errortype = data["type"];
				if(errortype == "success")
				{
					fid = "#"+fid;
					$(fid).hide();
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				//
			}
		});
	}
}

function run_website(id, urlpost, fid)
{
	$.ajax({
        url : urlpost,
        type: "POST",
        data : "runid="+id,
        success: function(data, textStatus, jqXHR)
        {
			var error = data["error"];
			var message = data["message"];
			var errortype = data["type"];
			if(errortype == "success")
			{
				elid = document.getElementById(fid);
				if(classie.has( elid, 'fa-play' ))
				{
					classie.remove( elid, 'fa-play' );
					classie.add( elid, 'fa-pause' );
				}
				else
				{
					classie.add( elid, 'fa-play' );
					classie.remove( elid, 'fa-pause' );
				}
			}
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
			//
        }
	});
}