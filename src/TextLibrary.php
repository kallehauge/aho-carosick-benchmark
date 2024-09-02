<?php

namespace Kallehauge\AhoCorasick;

class TextLibrary {
	public static function get( $type ) {
		return match ( $type ) {
			'mobydick' => self::get_moby_dick_text(),
			'product' => self::get_product_text(),
			default => throw new \Exception( 'Text library not supported.' ),
		};
	}

	/**
	 * Get the full content of the Moby Dick book.
	 *
	 * Stats:
	 *   1.2 MB
	 *   1,276,290 characters
	 *
	 * @return string
	 */
	public static function get_moby_dick_text(): string {
		return file_get_contents( __DIR__ . '/../mobydick.txt' );
	}

	/**
	 * Get product text with 6180 characters for a Giant bike.
	 *
	 * @return string
	 */
	public static function get_product_text(): string {
		return 'Giant Bikes: What Sets Them Apart Typical Giant bicycles for men and women feature a special frame geometry, known as Compact Road Design, which in essence means that the top tube of the frame slopes significantly downwards towards the seat tube. As a result, the two typical triangles in a bicycle frame are much smaller and more compact. The frame shape, known as sloping geometry, has the initial advantage of being lower in weight. In addition, the rigidity of your bike improves, and in turn so does your riding experience. Giant Bikes: What Sets Them Apart Typical Giant bicycles for men and women feature a special frame geometry, known as Compact Road Design, which in essence means that the top tube of the frame slopes significantly downwards towards the seat tube. As a result, the two typical triangles in a bicycle frame are much smaller and more compact. The frame shape, known as sloping geometry, has the initial advantage of being lower in weight. In addition, the rigidity of your bike improves, and in turn so does your riding experience. Giant Road Bikes & Gravel Bikes: Equipped with Cutting-Edge Technology as Standard From the gravel to the tarmac to the fight against the clock, Giant road bikes have got you covered no matter your requirements. The Giant CONTEND models are the perfect entry-level bikes for starting off in the world of cycling. Equipped with a carbon fork and D-Fuse seatpost technology as standard, they tick all the boxes in terms of speed, comfort and safety. The Giant PROPEL, on the other hand, promises the best aero performance. The extremely rigid, lightweight Advanced Composite frame is the linchpin of the streamlined racing machines. The Giant road bike models in the TCR and DEFY series offer ambitious riders the perfect balance between lightweight construction, rigidity and smooth running. And away from the tarmac and stress of everyday life, the comfort-oriented long-distance geometry of the REVOLT range will always come up trumps. Agile Giant gravel bikes can be easily converted to meet the requirements of everyday cycling or bikepacking thanks to their numerous mounting points. Giant Touring Bikes: Reliable Companions Both On and Off the Road Whether for work, sport or leisure, for men or for women, anyone and everyone can reap the benefits of the trekking bikes made by the quality brand from Taiwan. The versatile Giant trekking bikes from the ESCAPE CITY line are the perfect introduction to the Giant biking world. Extensively kitted out, these Giant bikes are reliable companions as you go about your day-to-day life. When it comes to TOUGHROAD, the name says it all: Giants lightest aluminium frame in combination with a flexible carbon fork ensures exceptional comfort, even off the beaten track. The Giant FASTTOUR combines the advantages of a reliable trekking bike with the speed orientation of a road bike, while the ALLTOUR has been systematically designed to get you to your destination efficiently and reliably, even over long distances. Giant Mountain Bikes & E-MTBs: Let the Off-Road Adventure Begin Giant is also an impressive player in the off-road sector, with a wide range of high-quality MTBs and e-mountain bikes. The classic Giant hardtail TALON is the perfect introduction to the world of mountain biking for touring riders who value control and stable handling. With the XTC mountain bike, Giant gives riders a ton of speed for tackling the XC trails of this world. The Advanced Composite frame is the lightest in its category and will noticeably optimise your energy transfer. Then there’s the XTC Jr., a childrens bike produced by Giant in aluminium, in a whole class of its own. The childrens MTBs are available in convenient 24+ and 26+ variants to help big kids gain confidence. If you still want to reach top speeds even on more demanding terrain, you’ll find a reliable companion from among the Giant mountain bike models in the TRANCE, STANCE and FATHOM ranges. The Giant TRANCE trail bike is an out-and-out downhill specialist. The Giant full sus comes with plenty of travel as well as the patented Maestro suspension technology. The Giant REIGN has been one of the kings of enduro since 2005: the extra-wide Boost hubs, plenty of travel on the front and rear suspension and choice between an aluminium or carbon frame and 27.5 or 29 inch wheels mean every enduro rider can get their moneys worth. And because everyone should be able to razz up and down the trails on a Giant e-mountain bike, Giant has motorised their long-standing MTB favourites and given them an E+. (Giant TALON E+, FATHOM E+, TRANCE E+, STANCE E+ and REIGN E+) Giant Electric Bikes: A New Kind of Mobility Giant has also created something special when it comes to e-bikes, for the main part through their use of Yamaha motors, which are among the most compact drives on the market, meaning that Giant e-bikes fit perfectly into the brands typical Compact Road design. What’s more, some models feature a downtube battery, whereby integrating the battery into the downtube keeps it better protected. This is particularly advantageous if you plan to go off-road with your Giant e-MTB. The Giant e-bike models in the EXPLORE E+ series are the absolute full package. Just like the urban QUICK-E+ city bikes, these Giant trekking e-bikes are equipped with a SyncDrive motor that delivers plenty of torque and automatically alters the pedalling assistance it provides based on your requirements. Giant Bike Accessories and Clothing: Maximum Comfort and Performance From arm warmers, caps and gloves to jackets, jerseys, trousers and shoes, with Giant and Liv, you’ll be able to find the right outfit for any season and weather conditions. Functionality, comfort and performance always take centre stage. Thanks to the Giant and Liv Fit Systems, you can choose between three different cuts depending on the purpose and your preferences. Giant MTB and road bike shoes have been developed in cooperation with biomechanists and professional athletes to give you optimal flex and energy transfer. Giant Diversion and Superlight jackets and vests, on the other hand, are reliable companions on cold and stormy days.';
	}
}
