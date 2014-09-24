$("#add_button").click(function(){
    var name = $('#name').val();
    var domain = $('#dom').val();
    var level = $('#level').val();
    var session = $('#session').val();
    var start = $('#start').val();
    var end = $('#end').val();
    
    $('#add_button').val("Inserting...");
    
    $.post("process/addnewschedule.php" , {name : name, domain: domain, level: level, session: session, start: start, end: end}, function(data){
        $("#scheduleTable > tbody").append(data);
    });
    $("#name").val("");
    $("#dom").val("");
    $("#level").val("");
    $("#session").val("");
    $("#start").val("");
    $("#end").val("");
    $("#noexist").remove();
    $("#add_button").val("Add Schedule");
});