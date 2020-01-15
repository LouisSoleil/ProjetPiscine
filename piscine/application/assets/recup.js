$(document).ready(function(){
    $.ajax({
        type:'POST',
        url:'../controllers/recupEleve.php',
        data:'idClasse='+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
        success: recevoirReponseEleve
    });
    $.ajax({
        type:'POST',
        url:'../controllers/recupToeicEleve.php',
        data:'codeINE='+$("#eleve").val()+"&idClasse="+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
        success: recevoirReponseToeic
    });
    
    $("#classe").change(function(){ 
        $("#eleve").empty();
        $("#eleve").append("<option value=0>Choisir un élève</option>");
        $.ajax({
                type:'POST',
                url:'../controllers/recupEleve.php',
                data:'idClasse='+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
                success: recevoirReponseEleve
        });
        $("#toeic").empty();
        $("#toeic").append("<option value=0>Choisir un toeic</option>");
        $.ajax({
                type:'POST',
                url:'../controllers/recupToeicEleve.php',
                data:'codeINE='+$("#eleve").val()+"&idClasse="+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
                success: recevoirReponseToeic
        });
        	
    });
    $("#groupe").change(function(){ 
        $("#eleve").empty();
        $("#eleve").append("<option value=0>Choisir un élève</option>");
        $.ajax({
                type:'POST',
                url:'../controllers/recupEleve.php',
                data:'idClasse='+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
                success: recevoirReponseEleve
        });
        $("#toeic").empty();
        $("#toeic").append("<option value=0>Choisir un toeic</option>");
        $.ajax({
                type:'POST',
                url:'../controllers/recupToeicEleve.php',
                data:'codeINE='+$("#eleve").val()+"&idClasse="+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
                success: recevoirReponseToeic
        });
        	
    });
    $("#eleve").change(function(){ 
        $("#toeic").empty();
        $("#toeic").append("<option value=0>Choisir un toeic</option>");
        $.ajax({
                type:'POST',
                url:'../controllers/recupToeicEleve.php',
                data:'codeINE='+$("#eleve").val()+"&idClasse="+$("#classe").val()+"&numGroupe="+$("#groupe").val(),
                success: recevoirReponseToeic
        });	
    });
});
function recevoirReponseEleve(reponse){
    //alert(reponse);

    $.each($.parseJSON(reponse), function(index, val){
        //alert(index);
        $("#eleve").append("\
            <option value='" + val['codeINE'] + "'>"+val['prenom']+" "+val['nom']+"</option>\n\
        ");
    });
}

function recevoirReponseToeic(reponse){
    alert(reponse);

    $.each($.parseJSON(reponse), function(index, val){
        //alert(val);
        $("#toeic").append("\
            <option value='" + val['IdTOEIC'] + "'>"+val['LibelleTOEIC']+"</option>\n\
        ");
    });
}
