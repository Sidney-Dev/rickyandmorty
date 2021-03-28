(function($, window, Drupal) {

    Drupal.behaviors.rickyAPI = {
        attach: function(context, settings) {

            console.log("Drupal  behaviors")
            const rickyForm = document.querySelector('#rickyForm') // form where the input text is
            const inputText = document.querySelector('#ricky-filter')   // get the input textfield
            const resultContainer = document.querySelector('#search-result-container') // get the container where the result it going to be output

            /**
             * During the submission, prevent default submission of the form
             * call the method that interacts with the API
             */
            rickyForm.addEventListener('submit', e => {
                e.preventDefault()
                
                findFromRicky()

            })


            const findFromRicky = () => {

                // newResult will get an array of objects depending on what it found
                let newResult = [] 

                fetch("https://rickandmortyapi.com/api/character")
                .then(response => {
                    if(response.ok){
                        return response.json()
                    }
                })
                .then(data => {
                    // all the results retrieved from the API stored here
                    const searchResults = data.results

                    /**
                     * loop through the API results
                     * check each result and check if the name is equal to the one enter in the search input
                     * all the results must be stored in th newResult variable
                     */
                    searchResults.forEach(result => {
                    
                        if(result.name === inputText.value) {
                            newResult.push(result)
                        }
                    })

                    if(newResult && newResult.length > 0){

                        // in case the same if found more than once in newResult select any randomly
                        const randomPick = Math.floor(Math.random() * newResult.length);
                        const randomPerson = newResult[randomPick]

                        const html = `
                            <div id="search-result">
                                <div class="dflex space-between">
                                    <div class="left">
                                        <img src="${randomPerson.image}" alt="">
                                    </div>
                                    <div class="right ricky-content">
                                        <h3 class="patua-one">${randomPerson.name}</h3>
                                        <div class="metadata roboto">
                                            <ul>
                                                <li><span class="meta-left">Species</span> <span class="meta-right">${randomPerson.species}</span></li>
                                                <li><span class="meta-left">Gender</span> <span class="meta-right">${randomPerson.gender}</span></li>
                                                <li><span class="meta-left">Origin</span> <span class="meta-right">${randomPerson.origin.name}</span></li>
                                                <li><span class="meta-left">Status</span> <span class="meta-right">${randomPerson.status}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                        resultContainer.innerHTML = html

                    } else {
                        const html = "<p>Nothing found</p>"
                        resultContainer.innerHTML = html

                    }

                })
                .catch(err => console.log(err))
            }


        }
    }


})(jQuery, window, Drupal)