var optionsMap = {
    Kigali: {
      Gasabo:["Bumbogo", "Gatsata", "Gikomero", "Gisozi", "Jabana", "Jali", "Kacyiru", "Kimihurura", "Kimironko", "Kinyinya", "Ndera", "Nduba", "Remera", "Rusororo", "Rutunga"],
      Kicukiro: ["Kagarama", "Niboye", "Gatenga", "Gikondo", "Gahanga", "Kanombe", "Nyarugunga", "Kigarama", "Masaka"],
      Nyarugenge:["Gitega", "Kanyinya", "Kigali", "Kimisagara", "Mageragere", "Muhima", "Nyakabanda", "Nyamirambo", "Nyarugenge", "Rwezamenyo"]
      },
    Eastern: {
      Bugesera:["Gashora", "Juru", "Kamabuye", "Ntarama", "Mareba", "Mayange", "Musenyi", "Mwogo", "Ngeruka", "Nyamata", "Nyarugenge", "Rilima", "Ruhuha", "Rweru", "Shyara"],
      Gatsibo: ["Gasange", "Gatsibo", "Gitoki", "Kabarore", "Kageyo", "Kiramuruzi", "Kiziguro", "Muhura", "Murambi", "Ngarama", "Nyagihanga", "Remera", "Rugarama", "Rwimbogo"],
      Kayonza: ["Gahini", "Kabare", "Kabarondo", "Mukarange", "Murama", "Murundi", "Mwiri", "Ndego", "Nyamirama", "Rukara", "Ruramira", "Rwinkwavu"],
      Kirehe: ["Gahara", "Gatore", "Kigarama", "Kigina", "Kirehe", "Mahama", "Mpanga", "Musaza", "Mushikiri", "Nasho", "Nyamugari", "Nyarubuye"],
      Ngoma: ["Gashanda", "Jarama", "Karembo", "Kazo", "Kibungo", "Mugesera", "Murama", "Mutenderi", "Remera", "Rukira", "Rukumberi", "Rurenge", "Sake", "Zaza"],
      Nyagatare: ["Gatunda", "Kiyombe", "Karama", "Karangazi", "Katabagemu", "Matimba", "Mimuli", "Mukama", "Musheli", "Nyagatare", "Rukomo", "Rwempasha", "Rwimiyaga", "Tabagwe"],
      Rwamagana: ["Fumbwe", "Gahengeri", "Gishari", "Karenge", "Kigabiro", "Muhazi", "Munyaga", "Munyiginya", "Musha", "Muyumbu", "Mwulire", "Nyakariro", "Nzige", "Rubona"]
      },
    Northern: {
      Burera: ["Bungwe", "Butaro", "Cyanika", "Cyeru", "Gahunga", "Gatebe", "Gitovu", "Kagogo", "Kinoni", "Kinyababa", "Kivuye", "Nemba", "Rugarama", "Rugendabari", "Ruhunde", "Rusarabuye", "Rwerere"],
      Gicumbi: ["Bukure", "Bwisige", "Byumba", "Cyumba", "Giti", "Kaniga", "Manyagiro", "Miyove", "Kageyo", "Mukarange", "Muko", "Mutete", "Nyamiyaga", "Nyankenke II", "Rubaya", "Rukomo", "Rushaki", "Rutare", "Ruvune", "Rwamiko", "Shangasha"],
      Gakenke: ["Busengo", "Coko", "Cyabingo", "Gakenke", "Gashenyi", "Mugunga", "Janja", "Kamubuga", "Karambo", "Kivuruga", "Mataba", "Minazi", "Muhondo", "Muyongwe", "Muzo", "Nemba", "Ruli", "Rusasa", "Rushashi"],
      Musanze: ["Busogo", "Cyuve", "Gacaca", "Gashaki", "Gataraga", "Kimonyi", "Kinigi", "Muhoza", "Muko", "Musanze", "Nkotsi", "Nyange", "Remera", "Rwaza", "Shingiro"],
      Rulindo: ["Base", "Burega", "Bushoki", "Buyoga", "Cyinzuzi", "Cyungo", "Kinihira", "Kisaro", "Masoro", "Mbogo", "Murambi", "Ngoma", "Ntarabana", "Rukozo", "Rusiga", "Shyorongi", "Tumba"]
    },
    Southern: {
      Gisagara:["Gikonko", "Gishubi", "Kansi", "Kibilizi", "Kigembe", "Mamba", "Muganza", "Mugombwa", "Mukindo", "Musha", "Ndora", "Nyanza", "Save"],
      Huye: ["Gishamvu", "Karama", "Kigoma", "Kinazi", "Maraba", "Mbazi", "Mukura", "Ngoma", "Ruhashya", "Huye", "Rusatira", "Rwaniro", "Simbi", "Tumba"],
      Kamonyi: ["Gacurabwenge", "Karama", "Kayenzi", "Kayumbu", "Mugina", "Musambira", "Ngamba", "Nyamiyaga", "Nyarubaka", "Rugalika", "Rukoma", "Runda"],
      Muhanga: ["Cyeza","Kabacuzi","Kibangu","Kiyumba","Muhanga","Mushishiro","Nyabinoni","Nyamabuye","Nyarusange","Rongi","Rugendabari","Shyogwe"],
      Nyamagabe: ["Buruhukiro", "Cyanika", "Gatare", "Kaduha", "Kamegeli", "Kibirizi", "Kibumbwe", "Kitabi", "Mbazi", "Mugano", "Musange", "Musebeya", "Mushubi", "Nkomane", "Gasaka", "Tare", "Uwinkingi"],
      Nyanza: ["Busasamana", "Busoro", "Cyabakamyi", "Kibirizi", "Kigoma", "Mukingo", "Muyira", "Ntyazo", "Nyagisozi", "Rwabicuma"],
      Nyaruguru:["Cyahinda", "Busanze", "Kibeho", "Mata", "Munini", "Kivu", "Ngera", "Ngoma", "Nyabimata", "Nyagisozi", "Muganza", "Ruheru", "Ruramba", "Rusenge"],
      Ruhango: ["Kinazi Sector", "Byimana", "Bweramana", "Mbuye", "Ruhango", "Mwendo", "Kinihira", "Ntongwe", "Kabagari"]
    },
    Western:{
      Karongi: ["Bwishyura", "Mutuntu", "Rubengera", "Gitesi", "Ruganda", "Rugabano", "Gishyita", "Gishari", "Mubuga", "Murambi", "Murundi", "Rwankuba","Twumba"],
      Ngororero: ["Bwira", "Gatumba", "Hindiro", "Kabaya", "Kageyo", "Kavumu", "Matyazo", "Muhanda", "Muhororo", "Ndaro", "Ngororero", "Nyange","Sovu"],
      Nyabihu: ["Bigogwe", "Jenda", "Jomba", "Kabatwa", "Karago", "Kintobo", "Mukamira", "Muringa", "Rambura", "Rugera", "Rurembo", "Shyira"],
      Nyamasheke: ["Ruharambuga", "Bushekeri", "Bushenge", "Cyato", "Gihombo", "Kagano", "Kanjongo", "Karambi", "Karengera", "Kirimbi", "Macuba", "Nyabitekeri", "Mahembe", "Rangiro", "Shangi"],
      Rubavu: ["Bugeshi", "Busasamana", "Cyanzarwe", "Gisenyi", "Kanama", "Kanzenze", "Mudende", "Nyakiliba", "Nyamyumba", "Nyundo", "Rubavu", "Rugerero"],
      Rusizi: ["Bugarama", "Butare", "Bweyeye", "Gikundamvura", "Gashonga", "Giheke", "Gihundwe", "Gitambi", "Kamembe", "Muganza", "Mururu", "Nkanka", "Nkombo", "Nkungu", "Nyakabuye", "Nyakarenzo", "Nzahaha", "Rwimbogo"],
      Rutsiro: ["Boneza","Gihango","Kigeyo","Kivumu","Manihira","Mukura","Murunda","Musasa","Mushonyi","Mushubati","Nyabirasi","Ruhango","Rusebeya"]
    }
  };
  
  function populateSecondSelect() {
    var firstSelect = document.getElementById("firstSelect");
    var secondSelect = document.getElementById("secondSelect");
    var selectedValue = firstSelect.value;
    
    // Clear existing options
    secondSelect.innerHTML = "<option value=''>District</option>";
    
    if (selectedValue) {
      var options = optionsMap[selectedValue];
      for (var option in options) {
        var optionElem = document.createElement("option");
        optionElem.value = option;
        optionElem.textContent = option;
        secondSelect.appendChild(optionElem);
      }
    }
  }
  
  function populateThirdSelect() {
    var secondSelect = document.getElementById("secondSelect");
    var thirdSelect = document.getElementById("thirdSelect");
    var selectedValue = secondSelect.value;
    
    // Clear existing options
    thirdSelect.innerHTML = "<option value=''>Sector</option>";
    
    var firstSelect = document.getElementById("firstSelect");
    var firstSelectedValue = firstSelect.value;
    
    if (firstSelectedValue && selectedValue) {
      var options = optionsMap[firstSelectedValue][selectedValue];
      for (var i = 0; i < options.length; i++) {
        var optionElem = document.createElement("option");
        optionElem.value = options[i];
        optionElem.textContent = options[i];
        thirdSelect.appendChild(optionElem);
      }
    }
  }