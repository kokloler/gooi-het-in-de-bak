document.addEventListener("DOMContentLoaded", function () {
    const faqQuestions = document.querySelectorAll(".faq-question");

    faqQuestions.forEach((faqQuestion) => {
        faqQuestion.addEventListener("click", function () {
            const faqAnswer = this.nextElementSibling;
            const icon = this.querySelector("i");
            const allFaqs = document.querySelectorAll(".faq");

            allFaqs.forEach((faq) => {
                if (faq !== this.parentElement) {
                    faq.classList.remove("active");
                    const faqIcon = faq.querySelector("i");
                    if (faqIcon.classList.contains("rotate-up")) {
                        faqIcon.classList.remove("rotate-up");
                    }
                }
            });

            this.parentElement.classList.toggle("active");

            if (icon.classList.contains("rotate-up")) {
                icon.classList.remove("rotate-up");
            } else {
                icon.classList.add("rotate-up");
            }
        });
    });
});
