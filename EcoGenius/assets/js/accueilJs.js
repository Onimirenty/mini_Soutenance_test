function getValeurAfficher(){
    var link = document.getElementById("myLink");

        // Add a click event listener to the link
            event.preventDefault(); // Prevent the link from navigating

            // Get the value from the link (you can modify the URL structure as needed)
            var value = link.href.split("=")[1];
            console.log(link);
            // Update the placeholder element with the value
            var placeholder = document.getElementById("valuePlaceholder");
            placeholder.textContent = "Value: " + value;
}