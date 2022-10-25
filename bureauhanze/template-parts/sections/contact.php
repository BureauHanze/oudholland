<section class="contact-form">
    <div class="container">
        <h2>Stuur ons een bericht</h2>
        <?php 
        echo do_shortcode('[contact-form-7 id="9" title="Contact" html_class="form-with-animated-labels"]');
        ?>
        <script>
        // Floating labels in contactForm7
        const formsWithAnimatedLabels = document.querySelectorAll(
            ".form-with-animated-labels"
        );
        const focusedClass = "focused";
        
        for (const form of formsWithAnimatedLabels) {
            const formControls = form.querySelectorAll(
                '[type="text"], [type="email"], [type="tel"], textarea'
            );
            for (const formControl of formControls) {
                formControl.addEventListener("focus", function () {
                    this.parentElement.nextElementSibling.classList.add(focusedClass);
                });
        
                formControl.addEventListener("blur", function () {
                    if (!this.value) {
                        this.parentElement.nextElementSibling.classList.remove(
                            focusedClass
                        );
                    }
                });
            }
            form.parentElement.addEventListener("wpcf7mailsent", function () {
                const labels = document.querySelectorAll(".focused");
                for (const label of labels) {
                    label.classList.remove(focusedClass);
                }
            });
        }
        </script>
    </div>
</section>