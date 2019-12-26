function changeImage(element) {

    var x = element.getElementsByTagName("img").item(0);
    var v = x.getAttribute("src");
    if (v == "../../france.jpg") {
        v = "uk.jpg";
    }
    else {
        v = "uk.jpg";
    }

    x.setAttribute("src",v);
}