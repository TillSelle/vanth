function copyToClipboard(elementid) {
    var copyText = document.getElementById(elementid);
    copyText.select();
    document.execCommand("copy");
    navigator.clipboard.writeText(copyText.value);
}
