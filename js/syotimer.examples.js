jQuery(function($){
    /* Simple Timer. The countdown to 20:30 2100.05.09 */
    $('#simple-timer').syotimer({
        year: 2018,
        month: 8,
        day: 04,
        hour: 09,
        minute: 00
    });

    /**
     * Getting a next of current index of array by circle
     * @param array
     * @param currentIndex
     * @returns {*}
     */
	 
    function getNextIndex(array, currentIndex) {
        return ( currentIndex === (array.length - 1) )
            ? 0
            : (currentIndex + 1);
    }

    /**
     * Update values in header title of timer `#periodic-timer_change-options`
     */
    function updateOptionTitles() {
        var effectIndex = parseInt(changeOptionsEffectType.data('index')),
            doubleNumberIndex = parseInt(changeOptionsDoubleNumbers.data('index')),
            languageIndex = parseInt(changeOptionsLang.data('index')),
            blocks = changeOptionsTimer.data('syotimer-blocks');
        blocks.headBlock.find('.option_type_effect-type')
            .html(EFFECT_TYPES[effectIndex]);
        blocks.headBlock.find('.option_type_double-numbers')
            .html((doubleNumberIndex) ? 'true' : 'false');
        blocks.headBlock.find('.option_type_language')
            .html(LANGUAGES[languageIndex]);
    }

    changeOptionsEffectType.click(function() {
        var button = $(this),
            effectIndex = parseInt( button.data('index') ),
            nextEffectIndex = getNextIndex(EFFECT_TYPES, effectIndex);
        button.data('index', nextEffectIndex);
        changeOptionsTimer.syotimer(
            'setOption',
            'effectType',
            EFFECT_TYPES[nextEffectIndex]
        );
        updateOptionTitles();
    });
    changeOptionsDoubleNumbers.click(function() {
        var button = $(this),
            index = parseInt( button.data('index') ),
            useDoubleNumbers = Math.abs(index - 1);
        button.data('index', useDoubleNumbers);
        changeOptionsTimer.syotimer(
            'setOption',
            'doubleNumbers',
            useDoubleNumbers === 1
        );
        updateOptionTitles();
    });
    changeOptionsLang.click(function() {
        var button = $(this),
            langIndex = parseInt( button.data('index') ),
            nextLangIndex = getNextIndex(LANGUAGES, langIndex);
        button.data('index', nextLangIndex);
        changeOptionsTimer.syotimer(
            'setOption',
            'lang',
            LANGUAGES[nextLangIndex]
        );
        updateOptionTitles();
    });


/* Localization in timer.
   Add new language */

// Adding of a words for signatures of countdown
$.syotimerLang.neng = {
    second: ['secondone', 'secondfive', 'seconds'],
    minute: ['minuteone', 'minutefive', 'minutes'],
    hour: ['hourone', 'hourfive', 'hours'],
    day: ['dayone', 'dayfive', 'days'],
    handler: 'nengNumeral'
};

// Adding of the handler that selects an index from the list of words
// based on ahead the going number
$.syotimerLang.nengNumeral = function(number) {
    var lastDigit = number % 10;
    if ( lastDigit === 1 ) {
        return 0;
    } else if ( lastDigit === 5) {
        return 1;
    } else {
        return 2;
    }
};

$('#periodic-timer_localization_new-english').syotimer({
    lang: 'neng',
    layout: 'ms',
    periodic: true,
    periodInterval: 6,
    periodUnit: 'm',
    headTitle: '<h3>Adding new language</h3>' +
        '<p>Demonstrate adding the new language of signatures.</p>'
});
});
