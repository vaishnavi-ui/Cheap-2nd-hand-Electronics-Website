function callUpdatePHP(devID) {
            document.cookie = "updateDeviceID = "+devID ;
            window.location.href = "UpdateDevice.php";
        }

        function displayBuyer(first_name,last_name,number,email,address,pincode,city,state)
        {
             parent=document.getElementById("dispDiv")
            parent.setAttribute('class','dispDiv1')
            
            while(parent.hasChildNodes()){
                parent.removeChild(parent.lastChild)
            }
            

            newH3=document.createElement("h3")
            newH3.appendChild(document.createTextNode("Buyer Details"))
            parent.appendChild(newH3)
            table=document.createElement("TABLE")

            row4=document.createElement("tr")

            td11=document.createElement("td")
            cell11 = document.createTextNode("Name: ");
            td11.setAttribute('class','tableHeader')
            td11.appendChild(cell11);

            td12=document.createElement("td")
            cell12 = document.createTextNode(first_name);
            td12.setAttribute('class','tableHeader')
            td12.appendChild(cell12);

            td13=document.createElement("td")
            cell13 = document.createTextNode("Number: ");
            td13.setAttribute('class','tableHeader')
            td13.appendChild(cell13);

            td14=document.createElement("td")
            cell14 = document.createTextNode(number);
            td14.setAttribute('class','tableHeader')
            td14.appendChild(cell14);

            row4.appendChild(td11)
            row4.appendChild(td12)
            row4.appendChild(td13)
            row4.appendChild(td14)
            table.appendChild(row4)

            row1=document.createElement("tr")

            td1=document.createElement("td")
            cell1 = document.createTextNode("Email: ");
            td1.setAttribute('class','tableHeader')
            td1.appendChild(cell1);

            td2=document.createElement("td")
            cell2 = document.createTextNode(email);
            td2.setAttribute('class','tableHeader')
            td2.appendChild(cell2);

            td3=document.createElement("td")
            cell3 = document.createTextNode("State: ");
            td3.setAttribute('class','tableHeader')
            td3.appendChild(cell3);

            td4=document.createElement("td")
            cell4 = document.createTextNode(state);
            td4.setAttribute('class','tableHeader')
            td4.appendChild(cell4);

            row1.appendChild(td1)
            row1.appendChild(td2)
            row1.appendChild(td3)
            row1.appendChild(td4)
            table.appendChild(row1)

            row2=document.createElement("tr")
            
            td5=document.createElement("td")
            cell5 = document.createTextNode("City: ");
            td5.setAttribute('class','tableHeader')
            td5.appendChild(cell5);

            td6=document.createElement("td")
            cell6 = document.createTextNode(city);
            td6.setAttribute('class','tableHeader')
            td6.appendChild(cell6);

            td7=document.createElement("td")
            cell7= document.createTextNode("Pincode: ");
            td7.setAttribute('class','tableHeader')
            td7.appendChild(cell7);

            td8=document.createElement("td")
            cell8 = document.createTextNode(pincode);
            td8.setAttribute('class','tableHeader')
            td8.appendChild(cell8);

            row2.appendChild(td5)
            row2.appendChild(td6)
            row2.appendChild(td7)
            row2.appendChild(td8)
            table.appendChild(row2)

            row3=document.createElement("tr")
            
            td9=document.createElement("td")
            cell9 = document.createTextNode("Address: ");
            td9.setAttribute('class','tableHeader')
            td9.appendChild(cell9);

            td10=document.createElement("td")
            cell10 = document.createTextNode(address);
            td10.setAttribute('class','tableHeader')
            td10.setAttribute('colspan','3')
            td10.appendChild(cell10);

           
            row3.appendChild(td9)
            row3.appendChild(td10)
            table.appendChild(row3)
            /*
           div1.appendChild(div2)
           div3.appendChild(table)
           div1.appendChild(div3)
           parent.appendChild(div1)*/
           parent.appendChild(table);
           
        }

        function display(name,img,type,price,brand,model,description,id,status)
        {
            
            parent=document.getElementById("dispDiv")
            parent.setAttribute('class','dispDiv1')
            
            while(parent.hasChildNodes()){
                parent.removeChild(parent.lastChild)
            }
            div1=document.createElement("div")
            div1.setAttribute('class','styleDiv1')
            div2=document.createElement("div")
            title=document.createElement("h1")
            title.appendChild(document.createTextNode(name))
            //title.setAttribute('class','title1')
            image=document.createElement("img")
            image.height="300"
            image.width="300";
            image.src=img;
            div2.appendChild(title)
            div2.appendChild(image)
            div2.setAttribute('class','dispFront')
            div3=document.createElement("div")
            div3.setAttribute('class','dispBack')

            newH3=document.createElement("h3")
            newH3.appendChild(document.createTextNode("Device Details"))
            div3.appendChild(newH3)
            table=document.createElement("TABLE")

            row4=document.createElement("tr")

            td11=document.createElement("td")
            cell11 = document.createTextNode("Id: ");
            td11.setAttribute('class','tableHeader')
            td11.appendChild(cell11);

            td12=document.createElement("td")
            cell12 = document.createTextNode(id);
            td12.setAttribute('class','tableHeader')
            td12.appendChild(cell12);

            td13=document.createElement("td")
            cell13 = document.createTextNode("Status: ");
            td13.setAttribute('class','tableHeader')
            td13.appendChild(cell13);

            td14=document.createElement("td")
            cell14 = document.createTextNode(status);
            td14.setAttribute('class','tableHeader')
            td14.appendChild(cell14);

            row4.appendChild(td11)
            row4.appendChild(td12)
            row4.appendChild(td13)
            row4.appendChild(td14)
            table.appendChild(row4)

            row1=document.createElement("tr")

            td1=document.createElement("td")
            cell1 = document.createTextNode("Type: ");
            td1.setAttribute('class','tableHeader')
            td1.appendChild(cell1);

            td2=document.createElement("td")
            cell2 = document.createTextNode(type);
            td2.setAttribute('class','tableHeader')
            td2.appendChild(cell2);

            td3=document.createElement("td")
            cell3 = document.createTextNode("Price: ");
            td3.setAttribute('class','tableHeader')
            td3.appendChild(cell3);

            td4=document.createElement("td")
            cell4 = document.createTextNode(price);
            td4.setAttribute('class','tableHeader')
            td4.appendChild(cell4);

            row1.appendChild(td1)
            row1.appendChild(td2)
            row1.appendChild(td3)
            row1.appendChild(td4)
            table.appendChild(row1)

            row2=document.createElement("tr")
            
            td5=document.createElement("td")
            cell5 = document.createTextNode("Brand: ");
            td5.setAttribute('class','tableHeader')
            td5.appendChild(cell5);

            td6=document.createElement("td")
            cell6 = document.createTextNode(brand);
            td6.setAttribute('class','tableHeader')
            td6.appendChild(cell6);

            td7=document.createElement("td")
            cell7= document.createTextNode("Model: ");
            td7.setAttribute('class','tableHeader')
            td7.appendChild(cell7);

            td8=document.createElement("td")
            cell8 = document.createTextNode(model);
            td8.setAttribute('class','tableHeader')
            td8.appendChild(cell8);

            row2.appendChild(td5)
            row2.appendChild(td6)
            row2.appendChild(td7)
            row2.appendChild(td8)
            table.appendChild(row2)

            row3=document.createElement("tr")
            
            td9=document.createElement("td")
            cell9 = document.createTextNode("Description: ");
            td9.setAttribute('class','tableHeader')
            td9.appendChild(cell9);

            td10=document.createElement("td")
            cell10 = document.createTextNode(description);
            td10.setAttribute('class','tableHeader')
            td10.setAttribute('colspan','3')
            td10.appendChild(cell10);

           
            row3.appendChild(td9)
            row3.appendChild(td10)
            table.appendChild(row3)
            
       div1.appendChild(div2)
       div3.appendChild(table)
       div1.appendChild(div3)
       parent.appendChild(div1)
        //parent.appendChild(document.createElement("br"))
        //parent.appendChild(image)
        //parent.appendChild(table)
        
            
        }
     
