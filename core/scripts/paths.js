$(document).ready(function(){
	
	// Shows access list if authentication required checkbox is checked
	$("#path_authentication_required").click(function(){
		if($("#access_list").length) {
			if ($(this).attr("checked")) $("#access_list").show();
			else $("#access_list").hide();
		}
	});
	
	// Shows new controller textbox if "new" is selected on the controller select	
	$("#path_controller_id").change(function(){
		triggerControllerBox();
	});
	
	// Changes the pre-path label to the selected parent path
	$("#path_parent").change(function(){
		$("#pathbefore").html($(this).children("option:selected").text());
	});
	
	// Changes the pre-path label, controller and template name on action parent change
	$("#action_parent").change(function(){
		// Set path before input
		$("#pathbefore").html($(this).children("option:selected").text());
		// Remove selected controller
		$("#action_controller option").removeAttr("selected");
		// Set selected controller
		$("#action_controller option[value='" + $(this).children("option:selected").attr("value") + "']").attr("selected", "selected");
		// Call path change
		showTemplateName();
		
	});
	
	// Changes the template name that gets generated
	$("#action_path").on("keyup", showTemplateName);
	
	// Action lists toggle
	$(".path .actionslist").hide();
	$(".path #actionstoggle").click(function(){
		if ($(".actionslist:visible").length) {
			$(".actionslist").hide();
			$(this).val("Show Actions");
		}
		else {
			$(".actionslist").show();
			$(this).val("Hide Actions");
		}
	});
	
	triggerControllerBox();
	showTemplateName();
	
});

function showTemplateName() {
	
		// Get action name
		if (!$("#action_path").length) return false;
		actionName = $("#action_path").val().replace(/[^a-z0-9-]/g, "")
		if (!actionName) return false;
	
		// Get selected controller
		controllerBase = $("#action_controller option:selected").text().replace(/Controller$/,'').toLowerCase();
	
		// Generate function name
		templateName = controllerBase + "-" + actionName + ".tpl";
		
		// Set in HTML
		$("#action_template_generate_container label").text("Generate template (" + templateName + ")");		
		
}

function triggerControllerBox() {
	if ($("#path_controller_id option:selected").val() == "new") $("#make_new_controller").show();
	else $("#make_new_controller").hide();
}