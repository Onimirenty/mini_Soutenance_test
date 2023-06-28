function toggleMenu() {
    var menu = document.querySelector('.menu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}

function display_component(className) {
    var component = document.querySelector('.' + className);
    component.style.display = component.style.display === 'none' ? 'block' : 'none';
}
function deleteProduct(className,data) {
        // document.getElementById('deleteId').value = id;
        document.getElementById('deleteData').value = JSON.stringify(data);
        display_component(className);
    }