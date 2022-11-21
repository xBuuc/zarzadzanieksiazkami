const form = document.getElementById("form");
const errorContainer = document.getElementById("errors");

let errors = [];

form.addEventListener("submit", (event) => {
	event.preventDefault();
	errors = [];

	const f = Object.values(form);

	for (const input of f) {
		console.log(
			`%cInput %c${input.id || "[other]"} %chas value %c${input.value}`,
			"color: #fff",
			"color: #0f0",
			"color: #fff",
			"color: #0f0"
		);

		input.classList.remove("error");

		let error = null;

		switch (input.id) {
			case "tytul":
				error = validateTytul(input.value);
				break;
			case "kodisbn":
				error = validateISBN(input.value);
				break;
			case "iloscegzemplarzy":
				error = validateIloscEgzemplarzy(input.value);
				break;
			default:
				break;
		}

		if (error !== null) {
			input.classList.add("error");
			const el = document.createElement("span");
			el.innerText = error;
			el.classList.add("error");
			input.after(el);
		}
	}

	console.log(errors);

	// for (const e of errors) {
	// 	const item = document.createElement("li");
	// 	item.innerText = e;
	// 	errorContainer.appendChild(item);
	// }

	if (errors.length <= 0) {
		form.submit();
	} else {
		errorContainer.classList.add("active");
	}
});

function validateTytul(tytul) {
	const isNotEmpty = tytul.length > 0;
	const isNotBig = tytul.length <= 128;

	const isValid = isNotEmpty && isNotBig;

	if (!isValid) {
		errors.push("Tytuł jest niepoprawny");
		return "Tytuł jest niepoprawny";
	}

	return null;
}

function validateISBN(kodisbn) {
	const isISBN =
		/^(?:ISBN(?:-13)?:? )?(?<gs1>\d{3})(?:(?<number>\d{9})|(?=[\d -]{14}$)[ -](?<registrationGroup>\d{1,5})[ -](?<registrant>\d{1,7})[ -](?<publication>\d{1,6})[ -])(?<checkDigit>\d)$/.test(
			kodisbn
		);

	isValid = isISBN;

	if (!isValid) {
		errors.push("Kod ISBN jest niepoprawny");
		return "Kod ISBN jest niepoprawny";
	}

	return null;
}

function validateIloscEgzemplarzy(iloscegzemplarzy) {
	const isNotEmpty = iloscegzemplarzy.length > 0;

	const isValid = isNotEmpty;

	if (!isValid) {
		errors.push("Nie podałeś liczby egzemplarzy");
		return "Nie podałeś liczby egzemplarzy";
	}

	return null;
}
