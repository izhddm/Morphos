<?php
namespace morphos\test\Russian;

use morphos\Gender;
use morphos\Russian\NounDeclension;

class NounDeclensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider wordsProvider
     */
    public function testDeclensionDetect($word, $animateness, $declension)
    {
        // skip word if it does not have declension
        if ($declension === null) {
            return true;
        }
        $this->assertEquals($declension, NounDeclension::getDeclension($word));
    }

    /**
     * @dataProvider wordsProvider
     */
    public function testInflection($word, $animateness, $declension, $inflected)
    {
        $this->assertEquals($inflected, array_values(NounDeclension::getCases($word, $animateness)));
    }

    public function wordsProvider()
    {
        return [
            // 1 - Женский, мужской род с окончанием [а, я].
            // 2 - Мужской рода с нулевым или окончанием [о, е],
            // 2 - Среднего рода с окончанием [о, е].
            // 3 - Женский род на мягкий и щипящий согласный.
            ['молния', false, 1, ['молния', 'молнии', 'молние', 'молнию', 'молнией', 'молние']],
            ['папа', true, 1, ['папа', 'папы', 'папе', 'папу', 'папой', 'папе']],
            ['слава', false, 1, ['слава', 'славы', 'славе', 'славу', 'славой', 'славе']],
            ['пустыня', false, 1, ['пустыня', 'пустыни', 'пустыне', 'пустыню', 'пустыней', 'пустыне']],
            ['вилка', false, 1, ['вилка', 'вилки', 'вилке', 'вилку', 'вилкой', 'вилке']],
            ['тысяча', false, 1, ['тысяча', 'тысячи', 'тысяче', 'тысячу', 'тысячей', 'тысяче']],
            ['копейка', false, 1, ['копейка', 'копейки', 'копейке', 'копейку', 'копейкой', 'копейке']],
            ['батарейка', false, 1, ['батарейка', 'батарейки', 'батарейке', 'батарейку', 'батарейкой', 'батарейке']],
            ['гривна', false, 1, ['гривна', 'гривны', 'гривне', 'гривну', 'гривной', 'гривне']],
            ['фабрика', false, 1, ['фабрика', 'фабрики', 'фабрике', 'фабрику', 'фабрикой', 'фабрике']],

            ['дом', false, 2, ['дом', 'дома', 'дому', 'дом', 'домом', 'доме']],
            ['поле', false, 2, ['поле', 'поля', 'полю', 'поле', 'полем', 'поле']],
            ['кирпич', false, 2, ['кирпич', 'кирпича', 'кирпичу', 'кирпич', 'кирпичем', 'кирпиче']],
            ['склон', false, 2, ['склон', 'склона', 'склону', 'склон', 'склоном', 'склоне']],
            ['сообщение', false, 2, ['сообщение', 'сообщения', 'сообщению', 'сообщение', 'сообщением', 'сообщении']],
            ['общение', false, 2, ['общение', 'общения', 'общению', 'общение', 'общением', 'общении']],
            ['воскрешение', false, 2, ['воскрешение', 'воскрешения', 'воскрешению', 'воскрешение', 'воскрешением', 'воскрешении']],
            ['доллар', false, 2, ['доллар', 'доллара', 'доллару', 'доллар', 'долларом', 'долларе']],
            ['евро', false, 2, ['евро', 'евро', 'евро', 'евро', 'евро', 'евро']],
            ['колье', false, 2, ['колье', 'колье', 'колье', 'колье', 'колье', 'колье']],
            ['фунт', false, 2, ['фунт', 'фунта', 'фунту', 'фунт', 'фунтом', 'фунте']],
            ['человек', true, 2, ['человек', 'человека', 'человеку', 'человека', 'человеком', 'человеке']],
            ['год', false, 2, ['год', 'года', 'году', 'год', 'годом', 'годе']],
            ['месяц', false, 2, ['месяц', 'месяца', 'месяцу', 'месяц', 'месяцем', 'месяце']],
            ['бремя', false, 2, ['бремя', 'бремени', 'бремени', 'бремя', 'бременем', 'бремени']],
            ['дитя', false, 2, ['дитя', 'дитяти', 'дитяти', 'дитя', 'дитятей', 'дитяти']],
            ['путь', false, 2, ['путь', 'пути', 'пути', 'путь', 'путем', 'пути']],
            ['поселок', false, 2, ['поселок', 'поселка', 'поселку', 'поселок', 'поселком', 'поселке']],
            ['пирсинг', false, 2, ['пирсинг', 'пирсинга', 'пирсингу', 'пирсинг', 'пирсингом', 'пирсинге']],
            ['столбец', false, 2, ['столбец', 'столбца', 'столбцу', 'столбец', 'столбцом', 'столбце']],
            ['гений', true, 2, ['гений', 'гения', 'гению', 'гения', 'гением', 'гении']],
            ['ястреб', true, 2, ['ястреб', 'ястреба', 'ястребу', 'ястреба', 'ястребом', 'ястребе']],
            ['карандаш', false, 2, ['карандаш', 'карандаша', 'карандашу', 'карандаш', 'карандашом', 'карандаше']],
            ['вкладыш', false, 2, ['вкладыш', 'вкладыша', 'вкладышу', 'вкладыш', 'вкладышом', 'вкладыше']],
            ['товарищ', false, 2, ['товарищ', 'товарища', 'товарищу', 'товарищ', 'товарищем', 'товарище']],
            ['руководитель', true, 2, ['руководитель', 'руководителя', 'руководителю', 'руководителя', 'руководителем', 'руководителе']],
            ['председатель', true, 2, ['председатель', 'председателя', 'председателю', 'председателя', 'председателем', 'председателе']],
            ['библиотекарь', true, 2, ['библиотекарь', 'библиотекаря', 'библиотекарю', 'библиотекаря', 'библиотекарем', 'библиотекаре']],
            ['санузел', false, 2, ['санузел', 'санузла', 'санузлу', 'санузел', 'санузлом', 'санузле']],
            ['урок', false, 2, ['урок', 'урока', 'уроку', 'урок', 'уроком', 'уроке']],
            // сущ мужского рода с мягким окончанием
            ['гвоздь', false, 2, ['гвоздь', 'гвоздя', 'гвоздю', 'гвоздь', 'гвоздем', 'гвозде']],
            ['день', false, 2, ['день', 'дня', 'дню', 'день', 'днем', 'дне']],
            ['камень', false, 2, ['камень', 'камня', 'камню', 'камень', 'камнем', 'камне']],
            ['рубль', false, 2, ['рубль', 'рубля', 'рублю', 'рубль', 'рублем', 'рубле']],
            // увеличительная форма
            ['волчище', true, 2, ['волчище', 'волчища', 'волчищу', 'волчище', 'волчищем', 'волчище']],
            ['полотнище', false, 2, ['полотнище', 'полотнища', 'полотнищу', 'полотнище', 'полотнищем', 'полотнище']],
            // уменьшительная форма
            ['волчок', false, 2, ['волчок', 'волчка',  'волчку',  'волчок',  'волчком',  'волчке']],
            ['котёнок', true, 2, ['котёнок', 'котёнка',  'котёнку',  'котёнка',  'котёнком',  'котёнке']],
            ['станок', false, 2, ['станок', 'станка',  'станку',  'станок',  'станком',  'станке']],
            ['комментарий', false, 2, ['комментарий', 'комментария',  'комментарию',  'комментарий',  'комментарием',  'комментарии']],

            ['ночь', false, 3, ['ночь', 'ночи', 'ночи', 'ночь', 'ночью', 'ночи']],
            ['новость', false, 3, ['новость', 'новости', 'новости', 'новость', 'новостью', 'новости']],

            // Адъективное склонение (от прилагательных и причастий)
            // мужской род
            ['выходной', false, null, ['выходной', 'выходного', 'выходному', 'выходной', 'выходным', 'выходном']],
            ['двугривенный', false, null, ['двугривенный', 'двугривенного', 'двугривенному', 'двугривенный', 'двугривенным', 'двугривенном']],
            ['рабочий', false, null, ['рабочий', 'рабочего', 'рабочему', 'рабочего', 'рабочим', 'рабочем']],
            // средний род
            ['животное', true, null, ['животное', 'животного', 'животному', 'животное', 'животным', 'животном']],
            ['подлежащее', false, null, ['подлежащее', 'подлежащего', 'подлежащему', 'подлежащее', 'подлежащим', 'подлежащем']],
            // женский род
            ['запятая', false, null, ['запятая', 'запятой', 'запятой', 'запятую', 'запятой', 'запятой']],
            ['горничная', true, null, ['горничная', 'горничной', 'горничной', 'горничную', 'горничной', 'горничной']],
            ['заведующая', true, null, ['заведующая', 'заведующей', 'заведующей', 'заведующую', 'заведующей', 'заведующей']],
        ];
    }

    /**
     * @dataProvider immutableWordsProvider
     */
    public function testImmutableWords($word)
    {
        $this->assertFalse(NounDeclension::isMutable($word, false));
    }

    public function immutableWordsProvider()
    {
        return [
            ['авеню'],
            ['атташе'],
            ['бюро'],
            ['вето'],
            ['денди'],
            ['депо'],
            ['жалюзи'],
            ['желе'],
            ['жюри'],
            ['интервью'],
            ['какаду'],
            ['какао'],
            ['кафе'],
            ['кашне'],
            ['кенгуру'],
            ['кино'],
            ['клише'],
            ['кольраби'],
            ['колье'],
            ['коммюнике'],
            ['конферансье'],
            ['кофе'],
            ['купе'],
            ['леди'],
            ['меню'],
            ['метро'],
            ['пальто'],
            ['пенсне'],
            ['пианино'],
            ['плато'],
            ['портмоне'],
            ['рагу'],
            ['радио'],
            ['самбо'],
            ['табло'],
            ['такси'],
            ['трюмо'],
            ['фортепиано'],
            ['шимпанзе'],
            ['шоссе'],
            ['эскимо'],
            ['галифе'],
            ['монпансье'],
        ];
    }

	/**
	 * @dataProvider gendersProvider()
	 */
    public function testGenderDetection($word, $gender)
	{
		$this->assertEquals($gender, NounDeclension::detectGender($word));
	}

	public function gendersProvider()
	{
		return [
			['вилка', Gender::FEMALE],
			['копейка', Gender::FEMALE],
			['кирпич', Gender::MALE],
			['рубль', Gender::MALE],
			['волчище', Gender::NEUTER],
			['бремя', Gender::NEUTER],
			['человек', Gender::MALE],
			['новость', Gender::FEMALE],
		];
	}
}
