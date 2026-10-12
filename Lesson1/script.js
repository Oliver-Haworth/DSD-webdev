const form = document.getElementById("contactForm");

form.addEventListener("submit", function (event) {
    event.preventDefault();
    const email = document.getElementById("email").value;
    console.log("Please enter a valid email address.");
});

const changeBoratQuote = document.getElementById("changeBoratQuote");

const quotes = [
        "\"You telling me the man who try to put a rubber fist in my anus was a homosexual?\" - Borat",
        "\"He is my neighbor Nursultan Tuliagby. He is pain in my assholes. I get a window from a glass, he must get a window from a glass. I get a step, he must get a step. I get a clock radio, he cannot afford. Great success!\" - Borat",
        "\"This is my country of Kazakhstan. It locate between Tajikistan, and Kyrgyzstan, and assholes Uzbekistan\" - Borat",
        "\"My wife is dead? [long pause] High five!\" - Borat",
        "\"This is Urkin, the town rapist. Naughty, naughty!\" - Borat",
        "\"What's up with it, Vanilla face? Me and my homie Azamat just parked our slab outside. We're looking for somewhere to post up our Black asses for the night. So, uh, bang bang, skeet skeet, nigga. Just a couple of pimps, no hos.\"",
        "\"[referring in thought to woman speaking in feminism group] I could not concentrate on what this old man was saying.\" - Borat",
        "\"Sometime my sister, she show her vazhïn to my brother Bilo and say \"You will never get this you will never get it la la la la la la.\" He behind his cage. He cries, he cries and everybody laughs. She goes \"You never get this.\" But one time he break cage and he \"get this\" and then we all laugh. High five!\" - Borat"
    ];

changeBoratQuote.addEventListener("click", function () {
    console.log("Borat quote changed");
    const randomElement = quotes[Math.floor(Math.random() * quotes.length)];
    document.getElementById("BoratQuote").innerHTML = randomElement;
});

// product button. on click = +1 to BasketCount, display confirmation

const addToBasket = document.getElementById("addToBasket");
let basket = 0;

const addToBasketButtons = document.querySelectorAll(".addToBasket");

addToBasketButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        basket += 1;

        document.getElementById("basket").innerHTML = basket;

        const productName = button.dataset.product;

        alert(`${productName} added to basket`);

        console.log(basket);
    });
});
