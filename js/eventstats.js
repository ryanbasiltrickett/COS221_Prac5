function getTopFive(){
    clearTable();
    //gets the top 5 swimmers/times for a certain event
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        console.log(this.response);
         var data = JSON.parse(this.response);
         console.log(data);
 
         if (data.status == "success"){
            var swimmers = data.data;
            document.getElementById("resultsArea").style.display = "grid";
            var cells = document.getElementsByClassName("gridCell");
            var contents = document.getElementsByClassName("gridContent");
            cells[0].style.display = "block";
            cells[1].style.display = "block";
            cells[2].style.display = "block";

            var counter = 3;
            var rank = 1;
            var contentCounter = 0;
            for (let swimmer of swimmers){
                cells[counter++].style.display = "block";
                cells[counter++].style.display = "block";
                cells[counter++].style.display = "block";
                contents[contentCounter++].innerText = rank++;
                contents[contentCounter++].innerText = swimmer.name;
                contents[contentCounter++].innerText = swimmer.time;
            }
            console.log(swimmers);
         } else {
            document.getElementById("resultsArea").style.display = "none";
            alert("No data available for selected event");
         }
     }

     params = {
        "function": "getTopForEvent",
        "eventId": document.getElementById("events").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function getEvents(){
    //gets a list of all events
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        
         var data = JSON.parse(this.response);
       //  console.log(data);
 
         if (data.status == "success"){
            let events = data.data;
            eventsDropDown = document.getElementById("events");
            for (let event of events){
                eventOption = document.createElement("option");
                eventOption.value = event.id;

                var fullName = event.dist +"m "+event.name+" ("+event.gender+")";
                eventOption.text = fullName;
                eventsDropDown.appendChild(eventOption);
            }
         } else {
            console.log("Could not retrieve event data");
         }
     }

     params = {
        "function": "getEvents"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function clearTable(){
    var cells = document.getElementsByClassName("gridCell");
    var contents = document.getElementsByClassName("gridContent");

    for (let cell of cells){
        cell.style.display = "none";
    }

    for (let content of contents){
        content.innerText = "";
    }
}

getEvents();