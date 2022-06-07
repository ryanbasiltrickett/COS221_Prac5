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
            table = document.getElementById("resultsArea");
            inner = "<tr>   <th>Rank</th>  <th>Swimmer</th>  <th>Time</th></tr>";
            
            rank = 1;
            for (let swimmer of swimmers){
                console.log("For loop");
                rank++;
                inner+="<tr><td>"+ rank +"</td><td>"+ swimmer.name +"</td><td>"+ swimmer.time +"</td></tr>";
            }
            console.log(swimmers); 
            table.innerHTML = inner;
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
    document.getElementById("resultsArea").innerHTML = "";
}

getEvents();