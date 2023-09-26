function pasteContent() {
	navigator.clipboard.readText().then(function(e) {
		document.getElementById("videoUrl").value = e
	}).catch(function(e) {
		console.error("Failed to read clipboard contents: ", e)
	})
}


// Define an array of language options
const languages = [
    "English",
    "Bahasa Indonesia",
    "Tiếng Việt",
    "Bahasa Malaysia",
    "Basa Jawa",
    "Čeština",
    "English - India",
    "Español",
    "Français",
    "German",
    "Italian",
    "Magyar",
    "Nederlands",
    "Polish",
    "Português",
    "Română",
    "Thailand",
    "Turkish (Turkey)",
    "Ελληνικά",
    "украї́нська мова",
    "Русский",
    "عَرَبِيّ",
    "한국어",
    "日本語"
];

// Get the UL element where the list will be generated
const dropdownMenu = document.getElementById("myDIV");

// Loop through the languages array and create list items
languages.forEach((language, index) => {
    const listItem = document.createElement("li");
    const anchor = document.createElement("a");
    anchor.classList.add("dropdown-item");
    anchor.href = `404-${index + 1}`; // Generate href based on index
    anchor.textContent = language;
    listItem.appendChild(anchor);
    dropdownMenu.appendChild(listItem);
});