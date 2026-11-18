<?php

namespace Sprint\Migration;


class Version20261113194914 extends Version
{
    protected $author = "admin";

    protected $description = "ИБ Каталог (clothes). Разделы каталога";

    protected $moduleVersion = "5.16.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'clothes',
            'catalog'
        );

        $helper->Iblock()->saveSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Обувь',
    'CODE' => 'shoes',
    'SORT' => '50',
    'ACTIVE' => 'Y',
    'XML_ID' => '19',
    'PICTURE' => '37',
    'DESCRIPTION' => 'Сложно представить себе элементы гардероба современного человека, которые выбирались бы более тщательно и основательно, чем обувь. Это больше, чем просто стильный аксессуар: ботинки, сапоги, туфли и другие модели выполняют очень важную функцию – они отвечают за комфорт, а иногда и за здоровье ног.<br />
					<br />
				',
    'DESCRIPTION_TYPE' => 'html',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Пантолеты',
        'CODE' => 'pantolety',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '26',
        'PICTURE' => '38',
        'DESCRIPTION' => 'Женские пантолеты – обувь, которая только с виду кажется непрактичной и простой. На самом деле, эти легкие и изящные шлепанцы универсальны: современные девушки все чаще выбирают их не только в качестве пляжной обуви, но и как удобный вариант на каждый день. Конечно, такая обувь в рамках офисного образа вряд ли станет удачным решением, однако в остальном у представительниц прекрасного пола – абсолютная свобода выбора.<br />
							<br />
						',
        'DESCRIPTION_TYPE' => 'html',
        'DETAIL_PICTURE' => NULL,
        'UF_BROWSER_TITLE' => NULL,
        'UF_KEYWORDS' => NULL,
        'UF_META_DESCRIPTION' => NULL,
        'UF_BACKGROUND_IMAGE' => NULL,
      ),
      1 => 
      array (
        'NAME' => 'Тапочки',
        'CODE' => 'slippers',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '32',
        'PICTURE' => '39',
        'DESCRIPTION' => 'Яркие, удобные женские и мужские тапочки: для домашнего уюта и полноценного отдыха. Эта обувь помогает расслабиться после тяжелого и напряженного дня.
							</br></br>
							Так приятно, придя домой, сменить тесные туфли или туфли на высоком каблуке на комфортные тапочки.
							</br></br>',
        'DESCRIPTION_TYPE' => 'html',
        'DETAIL_PICTURE' => NULL,
        'UF_BROWSER_TITLE' => NULL,
        'UF_KEYWORDS' => NULL,
        'UF_META_DESCRIPTION' => NULL,
        'UF_BACKGROUND_IMAGE' => NULL,
      ),
      2 => 
      array (
        'NAME' => 'Туфли',
        'CODE' => 'shoess',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '29',
        'PICTURE' => '40',
        'DESCRIPTION' => '<br />
							<br />
						',
        'DESCRIPTION_TYPE' => 'html',
        'DETAIL_PICTURE' => NULL,
        'UF_BROWSER_TITLE' => NULL,
        'UF_KEYWORDS' => NULL,
        'UF_META_DESCRIPTION' => NULL,
        'UF_BACKGROUND_IMAGE' => NULL,
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => ' Туфли Женские',
            'CODE' => 'women-s-shoes',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => '31',
            'PICTURE' => '41',
            'DESCRIPTION' => 'Считается, что женские туфли – это своеобразный «индикатор» наличия у девушки вкуса. Неправильно выбранная обувь может свести на нет все усилия по составлению эффектного и стильного образа. В то время как удачно выбранные женские туфли станут ярким акцентом даже самого скромного ансамбля.',
            'DESCRIPTION_TYPE' => 'html',
            'DETAIL_PICTURE' => NULL,
            'UF_BROWSER_TITLE' => NULL,
            'UF_KEYWORDS' => NULL,
            'UF_META_DESCRIPTION' => NULL,
            'UF_BACKGROUND_IMAGE' => NULL,
          ),
          1 => 
          array (
            'NAME' => 'Туфли Мужские',
            'CODE' => 'shoes-mens',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => '30',
            'PICTURE' => '42',
            'DESCRIPTION' => 'Мужская обувь, предлагаемая современными брендами представителям сильного пола, невероятно разнообразна. Касается это не только огромного количества всевозможных форм, но и различных стилевых отличий. Дело в том, что сегодня стало невероятно популярным смешение различных направлений и стилей, поэтому иногда даже в самых строгих ботинках можно найти легкие спортивные нотки.<br />
								',
            'DESCRIPTION_TYPE' => 'html',
            'DETAIL_PICTURE' => NULL,
            'UF_BROWSER_TITLE' => NULL,
            'UF_KEYWORDS' => NULL,
            'UF_META_DESCRIPTION' => NULL,
            'UF_BACKGROUND_IMAGE' => NULL,
          ),
        ),
      ),
    ),
  ),
  1 => 
  array (
    'NAME' => 'Платья',
    'CODE' => 'dresses',
    'SORT' => '100',
    'ACTIVE' => 'Y',
    'XML_ID' => '20',
    'PICTURE' => '43',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
  ),
  2 => 
  array (
    'NAME' => 'Штаны',
    'CODE' => 'pants',
    'SORT' => '200',
    'ACTIVE' => 'Y',
    'XML_ID' => '25',
    'PICTURE' => '44',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
  ),
  3 => 
  array (
    'NAME' => 'Нижнее белье',
    'CODE' => 'underwear',
    'SORT' => '300',
    'ACTIVE' => 'Y',
    'XML_ID' => '23',
    'PICTURE' => '45',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
  ),
  4 => 
  array (
    'NAME' => 'Футболки',
    'CODE' => 't-shirts',
    'SORT' => '400',
    'ACTIVE' => 'Y',
    'XML_ID' => '22',
    'PICTURE' => '46',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
  ),
  5 => 
  array (
    'NAME' => 'Спортивная Одежда',
    'CODE' => 'sportswear',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '21',
    'PICTURE' => '47',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
  ),
  6 => 
  array (
    'NAME' => 'Аксессуары',
    'CODE' => 'accessories',
    'SORT' => '700',
    'ACTIVE' => 'Y',
    'XML_ID' => '24',
    'PICTURE' => '48',
    'DESCRIPTION' => 'Без аксессуаров вряд ли получится создать стильный, завершенный и индивидуальный образ. Важно обращать внимание на то, насколько гармонично такие элементы будут смотреться в сочетании с тем или иным стилем в одежде, в рамках какого-либо мероприятия.<br />
				',
    'DESCRIPTION_TYPE' => 'html',
    'DETAIL_PICTURE' => NULL,
    'UF_BROWSER_TITLE' => NULL,
    'UF_KEYWORDS' => NULL,
    'UF_META_DESCRIPTION' => NULL,
    'UF_BACKGROUND_IMAGE' => NULL,
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Ремни',
        'CODE' => 'belts',
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '33',
        'PICTURE' => '49',
        'DESCRIPTION' => 'Модные женские пояса и ремни – это атрибут современной и стильной женщины, а также часть тщательно продуманного наряда. Придерживают ли они брюки на своем месте или эффектно подчеркивают талию, выполняют декоративную функцию или чисто практичную – не важно. ',
        'DESCRIPTION_TYPE' => 'html',
        'DETAIL_PICTURE' => NULL,
        'UF_BROWSER_TITLE' => NULL,
        'UF_KEYWORDS' => NULL,
        'UF_META_DESCRIPTION' => NULL,
        'UF_BACKGROUND_IMAGE' => NULL,
        'CHILDS' => 
        array (
          0 => 
          array (
            'NAME' => 'Ремни Женские',
            'CODE' => 'women-s-belts',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => '34',
            'PICTURE' => '50',
            'DESCRIPTION' => 'Женские ремни – это атрибут современной женщины, а также часть тщательно продуманного наряда. Придерживают ли они брюки на своем месте или эффектно подчеркивают талию, выполняют декоративную функцию или чисто практичную. Главное заключается в том, что для женщин ремень – это один из самых значимых аксессуаров. ',
            'DESCRIPTION_TYPE' => 'html',
            'DETAIL_PICTURE' => NULL,
            'UF_BROWSER_TITLE' => NULL,
            'UF_KEYWORDS' => NULL,
            'UF_META_DESCRIPTION' => NULL,
            'UF_BACKGROUND_IMAGE' => NULL,
          ),
          1 => 
          array (
            'NAME' => 'Ремни Мужские',
            'CODE' => 'men-s-belts',
            'SORT' => '500',
            'ACTIVE' => 'Y',
            'XML_ID' => '35',
            'PICTURE' => '51',
            'DESCRIPTION' => 'Стильные и качественные мужские ремни – обязательные аксессуары в гардеробе каждого современного представителя сильного пола, внимательно относящегося к своему внешнему виду. Правильно выбранный ремень поможет сделать образ завершенным, респектабельным и солидным.',
            'DESCRIPTION_TYPE' => 'html',
            'DETAIL_PICTURE' => NULL,
            'UF_BROWSER_TITLE' => NULL,
            'UF_KEYWORDS' => NULL,
            'UF_META_DESCRIPTION' => NULL,
            'UF_BACKGROUND_IMAGE' => NULL,
          ),
        ),
      ),
    ),
  ),
)        );
    }
}
