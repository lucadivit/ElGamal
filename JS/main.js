/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var cypherData;

$(document).ready(function () {
    $.ajax({
        url: "index.php",
        type: "post",
        data: {
            controller: "cifrazione",
            task: "elgamal"
        },
        success: function (data) {
            $("#contenitore").html(data);
            assegnaEventiAllaForm();
        }
    });

    $("#slideBarA").click(function () {
        $("#ElGamalBarLi").removeClass("active");
        $("#slideBarLi").addClass("active");
        $.ajax({
            url: "index.php",
            type: "post",
            data: {
                controller: "slide",
                task: "slide"
            },
            success: function (data) {
                $("#contenitore").html(data);
            }
        });
    });

    $("#ElGamalBarA").click(function () {
        $("#slideBarLi").removeClass("active");
        $("#ElGamalBarLi").addClass("active");
        $.ajax({
            url: "index.php",
            type: "post",
            data: {
                controller: "cifrazione",
                task: "elgamal"
            },
            success: function (data) {
                $("#contenitore").html(data);
                assegnaEventiAllaForm();
            }
        });
    });
});

function assegnaEventiAllaForm() {
    
    $("#BSGSContainer").hide();
    $("#loading").hide();
    
    $("#cypherButton").click(function () {
        $("#BSGSContainer").hide();
        // $("#elGamalContainer").hide();
        $("#loading").show();
        $.ajax({
            url: "index.php",
            type: "post",
            data: {
                controller: "cifrazione",
                task: "cifrazione",
                messaggio: document.getElementById("textToCypher").value
            },
            success: function (data) {
                cypherData = jQuery.parseJSON(data);
                document.getElementById("cypherText").value = cypherData["cypher"];
                document.getElementById("decypherText").value = cypherData["decypher"];
                $("#elGamalContainer").show();
                $("#loading").hide();
            }
        });
    });

    $("#clearButton").click(function () {
        $("#cypherText").val("");
        $("#decypherText").val("");
        $("#textToCypher").val("");
        $("#aExponent").val("");
        $("#BSGSText").val("");
    });

    $("#BSGSButton").click(function () {
        document.getElementById("aExponent").value = cypherData["a"];
        document.getElementById("BSGSText").value = cypherData["message"];
        $("#BSGSContainer").show();
    });
    
    $("#aExponent").popover({
        placement: "bottom",
        trigger: "hover",
        content: "This field contain the exponent used for cypher, computed with Baby Step Giant Step attack"
    });
    
    $("#BSGSText").popover({
        placement: "bottom",
        trigger: "hover",
        content: "This field contain the cleartext, computed with Baby Step Giant Step attack"
    })

}