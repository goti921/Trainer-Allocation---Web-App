$("#add_button").click(function(){
    var name = $('#name').val();
    var domain = $('#dom').val();
    var level = $('#level').val();
    
    $('#add_button').val("Inserting...");
    
    $.post("process/addnewtrainer.php" , {name : name, domain: domain, level: level}, function(data){
       $("#trainerTable > tbody").append(data);
    });
    $("#name").val("");
    $("#dom").val("");
    $("#level").val("");
    $("#noexist").remove();
    $("#add_button").val("Add Trainer");
});