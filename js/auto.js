function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the country names in the world:*/
var countries = ["Ahsania Mission University of Science and Technology","Ahsanullah University of Science and Technology","American International University-Bangladesh","Anwer Khan Modern University","Army University of Engineering and Technology (BAUET)","ASA University Bangladesh","Asian University of Bangladesh","Atish Dipankar University of Science & Technology","Bandarban University","Bandarban University","Bangladesh Army International University of Science & Technology(BAIUST)","Bangladesh Army University of Science and Technology(BAUST)","Bangladesh Islami University","Bangladesh University","Bangladesh University of Business & Technology","Bangladesh University of Health Sciences","BGC Trust University Bangladesh","BGMEA University of Fashion & Technology(BUFT)","BRAC University","Britannia University","Canadian University of Bangladesh","CCN University of Science & Technology",
"Central University of Science and Technology","Central Women's University","Chittagong Independent University","City University","Cox's Bazar International University","Daffodil International University","Dhaka International University","East Delta University","East West University","Eastern University","European University of Bangladesh","Exim Bank Agricultural University, Bangladesh","Fareast International University","Feni University","First Capital University of Bangladesh","German University Bangladesh","Global University Bangladesh","Gono Bishwabidyalay","Green University of Bangladesh","Hamdard University Bangladesh","IBAIS University","Independent University, Bangladesh","International Islamic University Chittagong","International University of Business Agriculture & Technology","Ishakha International University, Bangladesh","Khulna Khan Bahadur Ahsanullah University","Khwaja Yunus Ali University","Leading University","Manarat International University","Metropolitan University","N.P.I University of Bangladesh","North Bengal International University","North East University Bangladesh","North South University","North Western University","Northern University Bangladesh","Northern University of Business & Technology, Khulna","Notre Dame University Bangladesh","Port City International University",
"Premier University ","Presidency University","Prime University","Primeasia University","Pundra University of Science & Technology","Queens University","Rabindra Maitree University, Kushtia","Bangabandhu Sheikh Mujib Medical University","Bangabandhu Sheikh Mujibur Rahman Agricultural University","Bangabandhu Sheikh Mujibur Rahman Maritime University","Bangabandhu Sheikh Mujibur Rahman Science & Technology University","Bangladesh Agricultural University","Bangladesh Open University","Bangladesh University of Engineering & Technology","Bangladesh University of Professionals","Bangladesh University of Textiles","Barisal University","Begum Rokeya University","Chittagong Medical University","Chittagong University of Engineering & Technology","Chittagong Veterinary and Animal Sciences University","Comilla University","Dhaka University of Engineering & Technology","Hajee Mohammad Danesh Science & Technology University","Islamic Arabic University","Islamic University","Jagannath University","Jahangirnagar University","Jatiya Kabi Kazi Nazrul Islam University","Jessore University of Science & Technology","Khulna University","Khulna University of Engineering and Technology","Mawlana Bhashani Science & Technology University","National University","Noakhali Science & Technology University","Pabna University of Science and Technology","Patuakhali Science And Technology University","Rabindra University, Bangladesh","Rajshahi Medical University","Rajshahi University of Engineering & Technology","Rangamati Science and Technology University","Shahjalal University of Science & Technology","Sher-e-Bangla Agricultural University","Sylhet Agricultural University",
"University of Chittagong","University of Dhaka","University of Rajshahi","Rajshahi Science & Technology University (RSTU), Natore","Ranada Prasad Shaha University","Royal University of Dhaka","Rupayan A.K.M Shamsuzzoha University","Shah Makhdum Management University, Rajshahi","Shanto-Mariam University of Creative Technology","Sheikh Fazilatunnesa Mujib University","Sonargaon University","Southeast University","Southern University Bangladesh ",
"Stamford University Bangladesh","State University of Bangladesh","Sylhet International University ","Tagore University of Creative Arts, Keranigonj, Bangladesh",
"The International University of Scholars","The Millennium University","The People's University of Bangladesh ","The University of Asia Pacific","The University of Comilla ","Times University, Bangladesh","United International University","University of Creative Technology, Chittagong",
"University of Development Alternative","University of Global Village","University of Information Technology & Sciences","University of Liberal Arts Bangladesh","University of Science & Technology Chittagong","University of South Asia","Uttara University",
"Varendra University","Victoria University of Bangladesh","World University of Bangladesh","Z.H Sikder University of Science & Technology","Z.N.R.F. University of Management Sciences",
"Other"
];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("institute"), countries);
