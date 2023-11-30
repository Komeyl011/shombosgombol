function dropMenu(id) {
    let element = document.getElementById(id).classList;
    if (element.contains('hidden')) {
        element.remove('hidden');
    } else {
        element.add('hidden');
    }
}
