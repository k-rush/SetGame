//KYLE RUSH
//This is the main javascript for the client program.
$(document).ready(function(){
    //Initialize the progress bar
    //(I couldn't really get this to work)
    $("#progressbar").progressbar();
    //$("#progressbar").progressbar("value",0);
    
    var hand = [];
    
    var numImages = 81;
    var imgArray = new Array();
    /* The following loads the images into an array,
     * and attempts to update the progress bar. */
    for(var i = 1; i<=numImages; i++){
        
        //update the progress bar
        $("#progressBar").progressbar("value",100*(i/81));
        
        
        imgArray[i] = new Image();
        
        //if the image number is less than 10, we need to put a 0 in front of it
        if(i < 10)
            imgArray[i].src = "images/0" + i + ".gif";
        //otherwise go ahead and just use i as the image filename
        else
            imgArray[i].src = "images/" + i + ".gif";
        
    }
    
    /* Ajax function to get the hand */
    $.ajax(
        "index.php",
        {
            type: "GET",
            processData: false,
            data: "grp=Ajax&cmd=getCardList",
            dataType: "json",
            success: function(json) {
                hand = json;
                displayHand(imgArray, hand);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + jqXHR.responseText);
                alert("Error: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
    
    /* This will refresh the hand every 5 seconds */
    setInterval(function(){
        $.ajax(
            "index.php",
            {
                type: "GET",
                processData: false,
                data: "grp=Ajax&cmd=getCardList",
                dataType: "json",
                success: function(json) {
                    hand = json;
                    displayHand(imgArray, hand);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error: " + jqXHR.responseText);
                    alert("Error: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
    },5000);
});


function displayHand(imgArray, hand){
    var i = 0;
    
    // For each td in the imgTable,
    // put the corresponding image from the array.
    $("#imgTable td").each(function(){
        $(this).html(imgArray[hand[i]]);
        i++;
    });
    
    //When the user clicks on the image,
    //it toggles between having a border and being borderless.
    $("img").toggle(
    // border on
    function(){
        $(this).attr("border", "1px solid");
    }, 
    // border off
    function(){
        $(this).attr("border", "none");
    });
    
    
    
}


function ajaxGetHand(){
    $.ajax(
        "index.php",
        {
            type: "GET",
            processData: false,
            data: "grp=Ajax&cmd=getHand",
            dataType: "json",
            success: function(json) {
                hand = json;
                setHand(hand);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + jqXHR.responseText);
                alert("Error: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
}


function checkSet(values,test){
    var properties = new Array();
    var i;
    switch(test){
        case "COLOR":
            for(i=0; i<values.length; i++){
                properties[i] = (Math.ceil(values[i]/3)-1)%3+1;
            }
            return checkProperties(properties);
        
        case "SHAPE":
            for(i=0; i<values.length; i++){
                properties[i] = (Math.ceil(values[i]/9)-1)%3+1;
            }
            return checkProperties(properties);
        
        case "FILL":
            for(i=0; i<values.length; i++){
                properties[i] = (Math.ceil(values[i]/27)-1)%3+1;
            }                    
            return checkProperties(properties);
    }
}


function checkProperties(properties){
    if(properties[0] == properties[1] == properties[2])
        return true;
    else if((properties[0]==properties[1]) || (properties[0]==properties[2]) || (properties[1] == properties[2]))
        return false;
    else
        return true;    
}

function replaceHand(newCards){
   for(var i=0;i<3;i++){
       $(selected[i]).parent().html(images[newCards[i]]);
   }
   
   var currentHand = new Array();
   
   for(i=0;i<9;i++){
      $("td > img").each(function(){
          currentHand[i] = $(this).val("id");
      });
   }
   borderCount=0;
   cleared = false;
   setHand(currentHand);
}

function shuffleHand(){
  var i = currentHand.length;
  if(i==0) return false;
  while(--i){
      var j = Math.floor( Math.random() * (i+1));
      var tempi = currentHand[i];
      var tempj = currentHand[j];
      currentHand[i] = tempj;
      currentHand[j] = tempi;
  }
}
