document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#de").addEventListener("click", GermanAbout);
    document.querySelector("#en").addEventListener("click", EnglishAbout);
    document.querySelector("#legal").addEventListener("click", Legal);
    document.querySelector("#src").addEventListener("click", function() { window.open("https://github.com/TillSelle/vanth/", '_blank') })
});

function GermanAbout() {
    var newInner = "<h1 class=\"ptext whytitle\">Wer bin ich?</h1>";
    newInner += "<p class=\"ptext abouttext\">";
    newInner += "Ich bin ein 17-jähriger Programmierer aus Deutschland, um genauer zu sein Chemnitz in Sachsen. Angefangen mit dem Programmieren habe ich, da ich in Filmen so genannte \"Hacker\" gesehen habe und das unglaublich cool fand.<br><br> Ich habe über die Zeit jedoch verstanden, dass es diese \"Hacker\" so nicht gibt. An diesem Punkt war ich jedoch schon so in dem Thema Programmierung drin, dass ich es auch ohne solch einen Grund einfach aus Spaß weiter gemacht habe. Über die Zeit (7-8 Jahre) habe ich einige Projekte fertiggestellt, viele von diesen gingen jedoch bei dem Wechsel zu meinem neuen PC verloren.<br> Auch wenn ich das später ein bisschen bereut habe, waren die meisten dieser Projekte für mich an diesem Punkt schon wieder ziemlich schlecht umgesetzt, weswegen es sich für mich nicht unbedingt wie ein Verlust angefüllt hat.<br><br> Ich habe zwar schon einiges an Erfahrung, wenn es um tatsächliche Programmierung geht, jedoch habe ich kaum Erfahrung zum Programmieren im Team. Doch das ist etwas, was ich plane in den nächsten Jahren durch den Wechsel von Schule zu Job zu ändern.";
    newInner += "</p>";
    document.querySelector("#aboutme").innerHTML = newInner;
}

function EnglishAbout() {
    var newInner = "<h1 class=\"ptext whytitle\">Who am I?</h1>";
    newInner += "<p class=\"ptext abouttext\">";
    newInner += "I am a 17-year-old programmer from Germany, to be more specific Chemnitz in Saxony. I started programming because I saw so-called \"hackers\" in movies and thought it was extremely cool.<br><br> But with time I understood that these \"hackers\" don't exist the way I thought they did. At that time I was already so into programming though, that even without such a reason I just kept doing it for fun. In all of this time (7-8 years) I finished quite a few projects, but a lot of them got lost when I switched to my new PC.<br> Although I regretted it a bit later, most of those projects were pretty poorly implemented for me at the time, so it didn't necessarily feel like a loss to me.<br><br> While I have some experience in terms of actual programming, I have very little experience in programming as part of a team. However, that is something I plan to change in the next few years as I move from going to a school to doing an actual job."
    newInner += "</p>";
    document.querySelector("#aboutme").innerHTML = newInner;
}

function Legal() {
    var newInner = "<h1 class=\"ptext whytitle\">Impressum</h1>";
    newInner += "<p class=\"ptext abouttext\">";
    newInner += "Angaben gem. § 5 TMG<br>Till Selle<br>Andréstraße 25<br>09112 Chemnitz, Germany<br>Telefon: +49 (0)173 5459726<br>Email: selle.till@gmail.com/admin@vanth.xyz<br><br>Im normalfall werden bei uns weder Daten noch Cookies gespeichert. Anders sieht es jedoch auf den Seiten \"vanth.xyz/Tracking/*\" aus. Wer diese Seiten aufruft muss unter umständen damit rechnen das folgende Daten hinterlegt werden: IP Adresse des Nutzers, Zeitangabe des Zugriffs und der User-Agent. Dazu werden Cookies zum Login verwendet. Es werden keine Cookies zu irgenwelchen anderen Zwecken gespeichert.<br>";
    newInner += "<br>§ 1 Externe Links<br>Diese Website enthält Verknüpfungen zu Websites Dritter (\"externe Links\"). Diese Websites unterliegen der Haftung der jeweiligen Betreiber. Der Anbieter hat bei der erstmaligen Verknüpfung der externen Links diefremden Inhalte daraufhin überprüft, ob etwaige Rechtsverstöße bestehen. Zu dem Zeitpunkt waren keine Rechtsverstöße ersichtlich. Der Anbieter hat keinerlei Einfluss auf die aktuelle und zukünftige Gestaltungund auf die Inhalte der verknüpften Seiten. Das Setzen von externen Links bedeutet nicht, dass sich der Anbieter die hinter dem Verweis oder Link liegenden Inhalte zu Eigen macht. Eine ständige Kontrolle der externen Links ist für den Anbieter ohne konkrete Hinweise auf Rechtsverstöße nicht zumutbar. Bei Kenntnis von Rechtsverstößen werden jedoch derartige externe Links unverzüglich gelöscht.";
    newInner += "</p>";
    document.querySelector("#aboutme").innerHTML = newInner;
}
