var unsavedChanges = false;

$(document).ready(function() {

    $('a[data-toggle="tab"]').on('shown', function(e){
        //save the latest tab using a cookie:
        $.cookie('last_tab', $(e.target).attr('href'));
    });
    //activate latest tab, if it exists:
    var lastTab = $.cookie('last_tab');
    if (lastTab) {
        $('a[href=' + lastTab + ']').tab('show');
    }
	
    $("#dnsRecords input").on("keypress",function() {
        $("#dnsTitle a.save, #dnsTitle a.undo").removeClass("disabled");
    });
    $("#dnsRecords span.delete").on("click",function() {
        $("#dnsTitle a.save, #dnsTitle a.undo").removeClass("disabled");
    });
	

    $("#dnsRecords div.add > span > span").click(function() {
        // Pass true argument with clone to clone element AND events
        var newRecord = $(this).parents("div.add").nextAll(".newRecord").clone( true );
        var counterElement = $("#dnsRecords input[name='newRecords']");
        var newId = parseInt(counterElement.attr("value"));
        newId++;
        counterElement.attr("value",newId);
		
        if ( $(this).parents("div.add").siblings().length > 2 ) {
            newRecord.find("label").remove();
        }	
		
        $("input",newRecord).each(function() {
            var fieldName = $(this).attr("name").replace("proto_","");
			
            $(this).attr("name",fieldName + "[new_" + newId + "]");
        });
		
        newRecord.addClass("dnsRecord new").removeClass("newRecord");
		
        newRecord.insertBefore($(this).parents("div.add")).fadeIn();
		
        $(this).parents("div.records").scrollTop($(this).parents("div.records").scrollTop() + 1000);
		
        $("#dnsTitle a.undo").removeClass("disabled");
       
        //Added this to allow save function upon cloned field
        $("#dnsTitle a.save").removeClass("disabled");
		
    });
	
    $("span.delete").on('click',function() {
        $(this).parents("div.dnsRecord").addClass("deleted").find("input.delete").val("true");
        $(this).parents("div.dnsRecord").find("span.undo").fadeIn('slow');
        unsavedChanges = true;
    });
	
	
    $("div.dnsRecordSOA div.serial input").attr("disabled","disabled");
	
    $("div.dnsRecordMX div.hostName input").on('keypress',function() {
        displayWarning("The host name portion of an MX record is typically left blank.<BR/>" +
            "Only enter host name if you want the email address to be similar to <strong>username@hostname.example.com</strong>, " +
            "where hostname is what you are entering and example.com is the current domain name.");
        $("div.dnsRecordMX div.hostName input").die();
    });

    $("div.dnsRecordNS div.hostName input").on('keypress',function() {
        displayWarning("The host name portion of an NS record is typically left blank.<BR/>" +
            "Only enter host name if you want to delegate a host to another name server.");
        $("div.dnsRecordNS div.hostName input").die();
    });

    $("div.hostName > input").on('change',function() {
        var hostName = $(this).val();
        var domainName = $("#domainName").val();
        var pattern = new RegExp(domainName + "$","g"); 
        if ( hostName.match(pattern) != null ) {
            displayWarning({
                width: '460px', 
                message: "A host name record has been entered with the domain name.<BR/><BR/>" +
                "The result will be the following:<BR/><strong>" + $(this).val() + "." + $("#domainName").val() + "</strong><BR/><BR/>" +
                "If this is not what you intended, remove the domain name from the host name field and enter in only the host value into the Host Name field."
                });
        }
    });
	
	
    $("div.dnsRecord input[type='text']").on('keypress',function() {
        $(this).parents("div.dnsRecord").find("span.undo").fadeIn('slow');
        unsavedChanges = true;
    });
	
	
    $("span.undo").on("click",function() {
		
        $(".records div.dnsRecordError").parents("div.records").each(function(index) {
            var id = this.id;
            $("a[href='#"+id+"']").removeClass("tabError");
        });
		
        $(this).parents("div.dnsRecord").find("input[type='text']").each(function() {
            var myName = $(this).attr("name");
            myName = "original_" + myName;
			
            $(this).val($("input[name='" + myName +"']").val());
            $(this).parents("div.dnsRecord").removeClass("dnsRecordError");
            $(this).parents("div.dnsRecord").find("div.errorMessage").remove();
			
            $(this).parents("div.dnsRecord").removeClass("deleted").find("input.delete").val("false");
			
        });
				
        $(this).fadeOut('fast');
    });
	
    $(".records div.dnsRecordError").parents("div.records").each(function(index) {
        var id = this.id;
        $("a[href='#"+id+"']").addClass("tabError");
    });

//    $(".records div.dnsRecordError").parents("div.records").last().each(function() {
//        $("#dnsRecords").tabs("select",this.id);
//        $("#dnsTitle a.undo").removeClass("disabled");
//    });
	
	
    //Save Changes
    $("#dnsTitle a.save").click(function() {
        if ( $(this).hasClass("disabled") ) return false;
        $("form").submit();
        return false;
    });
	
    //Undo Changes
    $("#dnsTitle a.undo").click(function() {
        if ( $(this).hasClass("disabled") ) return false;
        $("span.undo").click();
        $("#dnsRecords div.records > div.new").remove();
		
		
        $("#dnsTitle a.save, #dnsTitle a.undo").addClass("disabled");
        unsavedChanges = false;
		
        return false;
    });

    $("form").submit(function() {
        unsavedChanges = false;
		
        //Remove any entries that have no value for any relevant fields
        $("div.dnsRecord").each(function() {
            var hasValue = false;
            $("input",$(this)).not("input[name*='ttl'], input[name*='type']").filter(function() {
                var val = $(this).val();
                return val != "" || val > 0;
            }).each(function() {
                hasValue = true;
            });
            if ( !hasValue ) {
                $(this).remove();
            }
        });
		
        return true;
    });
	
    $("#dnsImport div.content > div").click(function() {
        $("input[type='radio']",this).attr("checked","checked");
    });
		
});


function displayWarning (message) {

    var html = "";
    var height = "auto";
    var width = "360";

    if ( typeof message == "object" ) {
        html = message.message;
        if ( typeof message.height != "undefined" ) {
            height = message.height;
        }
        if ( typeof message.width != "undefined" ) {
            width = message.width;
        }

    } else {
        html = message;
    }

    $("<div/>").html(html).dialog({
        autoOpen: true,
        width: width,
        height: height,
        stack: true,
        modal: true,
        resizable: false,
        draggable: false,
        dialogClass: "dialogWarning",
        buttons: {
            "Close": function() {
                $(this).dialog("close");
            }
        },
        close: function () {
            $(this).remove();
        },
        title: 'Warning'
    });

}
