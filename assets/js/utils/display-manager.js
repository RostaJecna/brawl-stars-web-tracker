export default class DisplayManager {

    /**
    * * Display an array of elements in a container with a fade-in animation.
    * @param {jQuery} container - The jQuery object representing the container element.
    * @param {Array} inputArray - The array of input elements to display.
    * @param {Array} classes - An array of Bootstrap classes to apply to each displayed element.
    * @param {Function} html - The HTML generating function to create the content of each displayed element.
    */
    static displayArray(container, inputArray, classes, html) {
        const elements = inputArray.map(element =>
            $(`
        <div class="${classes.join(' ')}">
            ${html(element)}
        </div>
        `).hide().fadeIn(1000)
        );

        container.empty().append(elements);
    }

    /**
     * * Display an error message in a container with a fade-in animation.
     * @param {jQuery} container - The jQuery object representing the container element.
     * @param {Object} xhr - The XMLHttpRequest object containing the error details.
     */
    static displayError(container, xhr) {
        const errorHtml = $(`
        <div>
            <div class="alert alert-danger" role="alert" data-bs-theme="light">
                Apologies for the inconvenience. We're currently unable to load the data. Please try
                <span><a href="${window.location.href}" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">again</a></span> in a few minutes.
                <hr>
                Status Code: ${xhr.status}.
                Message: ${xhr.statusText}.
            </div>
        </div>`).hide().fadeIn(250);

        container.empty().append(errorHtml);
    }
    /**
     * Displays a warning message in the specified container, indicating that the data was loaded from local storage.
     * @param {jQuery} container - The jQuery object where the warning message will be appended.
     * @param {XMLHttpRequest} xhr - The XMLHttpRequest object containing the error details.
     */
    static displayStorageWarning(container, xhr) {
        const warningHtml = $(`
        <div>
            <div class="alert alert-warning d-flex align-items-center" role="alert" data-bs-theme="light">
                <div>
                    Loaded from local storage.
                    The information may not be up to date.
                    <hr>
                    Status Code: ${xhr.status}.
                    Message: ${xhr.statusText}.
                </div>
            </div>
        </div>
        `).hide().fadeIn(250);

        container.append(warningHtml);
    }
}