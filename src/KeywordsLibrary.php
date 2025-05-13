<?php

namespace Kallehauge\AhoCorasick;

class KeywordsLibrary {
	/**
	 * 30 bike specific keywords that all exist in the Giant bike text.
	 */
	public const BIKE_KEYWORDS = [
		'giant', 'compact road', 'geometry', 'frame', 'sloping', 'seat tube', 'triangles', 'lightweight', 'rigidity',
		'gravel', 'tarmac', 'contend', 'carbon fork', 'seatpost', 'aero', 'propel', 'defy', 'revolt', 'bikepacking',
		'escape city', 'toughroad', 'fasttour', 'alltour', 'hardtail', 'talon', 'xtc', 'trance', 'stance', 'reign', 'bike',
	];

	/**
	 * 970 random keywords, mostly ocean and sea themed.
	 */
	public const RANDOM_KEYWORDS = [
		'whale-boat', 'the whale watch', 'candles', 'stove', 'sing', 'considerable', 'depth', 'donotexist',
		'phosphorescence', 'tableau', 'midnight', 'big', 'anchors', 'moved', 'africa', 'denmark',
		'ocean', 'mystery', 'adventure', 'compass', 'sailor', 'harpoon', 'voyage', 'seashell', 'tide',
		'barnacle', 'reef', 'island', 'dolphin', 'submarine', 'coral', 'buoy', 'waves', 'mariner',
		'kelp', 'nautical', 'port', 'starboard', 'captain', 'deck', 'cargo', 'galley', 'lifeboat',
		'mast', 'rudder', 'seagull', 'shipwreck', 'whirlpool', 'current', 'lagoon', 'pier', 'dock',
		'fathom', 'gale', 'horizon', 'jetty', 'keel', 'lighthouse', 'marina', 'narwhal', 'oyster',
		'plankton', 'quay', 'rigging', 'sonar', 'trawler', 'undertow', 'vessel', 'wharf', 'yacht',
		'seafarer', 'buoyancy', 'chart', 'helm', 'jib', 'knot', 'logbook', 'mooring', 'navigation',
		'oar', 'prow', 'quarterdeck', 'stern', 'transom', 'underwater', 'vortex', 'wake', 'woocommerce',
		'xebec', 'zephyr', 'anchor', 'brigantine', 'cabin', 'draft', 'engine', 'ferry', 'romcom',
		'gangway', 'hull', 'iceberg', 'jetsam', 'ketch', 'mizzen', 'navigable', 'outboard', 'sweden',
		'propeller', 'quicksand', 'raft', 'skiff', 'tanker', 'upwind', 'voyager', 'waterline', 'x-ray',
		'yawl', 'zodiac', 'albatross', 'beacon', 'crowsnest', 'driftwood', 'ensign', 'figurehead',
		'gangplank', 'halyard', 'intercom', 'jackstay', 'killick', 'leeward', 'mainmast', 'secondmast',
		'oceanography', 'pinnace', 'quarantine', 'ratlines', 'sextant', 'topsail', 'undertake', 'vane',
		'windlass', 'yardarm', 'aerodynamics', 'ballast', 'coastguard', 'davit', 'embark', 'beautiful',
		'focile', 'gunwale', 'hawser', 'inboard', 'jack', 'keelhauling', 'liferaft', 'machine',
		'nautilus', 'overboard', 'privateer', 'quayside', 'soundings', 'tiller', 'upkeep', 'ecommerce',
		'vanguard', 'watercraft', 'xylophone', 'yaw', 'zenith', 'dogwatch', 'pump', 'quayage',
		'abyss', 'beach', 'cove', 'watersplash', 'estuary', 'fjord', 'gulf', 'harbor', 'inlet', 'jetstream',
		'kelpforest', 'lunar', 'mangrove', 'nautilusos', 'oceanic', 'planktonic', 'quintessential',
		'reefbuilding', 'shoal', 'tidalwave', 'undersea', 'volcanic', 'waterlogged', 'xenon', 'yearling',
		'zooplankton', 'archipelago', 'brackish', 'continental', 'delta', 'ecosystem', 'fjordic', 'glacial',
		'hydrothermal', 'intertidal', 'jellyfish', 'krill', 'lagoonal', 'manta', 'neritic', 'oceanarium',
		'pelagic', 'quartz', 'riptide', 'seabed', 'thermocline', 'upwelling', 'vent', 'wavefront', 'xylem',
		'yellowfin', 'zeolitic', 'aquatic', 'biodiversity', 'crustacean', 'detritus', 'echolocation',
		'flounder', 'goby', 'habitat', 'ichthyology', 'juvenile', 'kraken', 'larval', 'mollusk', 'nekton',
		'octopus', 'polyps', 'quahog', 'remora', 'sargassum', 'translucent', 'urchin', 'vertebrate',
		'weedy', 'xiphias', 'yabby', 'zooxanthellae', 'anemone', 'barracuda', 'clam', 'dolphinfish',
		'eelgrass', 'finback', 'gannet', 'halibut', 'isopod', 'jackfish', 'kelpfish', 'lamprey', 'mako',
		'nudibranch', 'orca', 'pufferfish', 'queenfish', 'rockfish', 'skipjack', 'tuna', 'urchins',
		'viperfish', 'wahoo', 'xenophyophore', 'yellowtail', 'zebrafish', 'anglerfish', 'blenny', 'chub',
		'damselfish', 'electricray', 'flatfish', 'gar', 'haddock', 'icefish', 'jawfish', 'kingfish',
		'lionfish', 'monkfish', 'needlefish', 'oarfish', 'pipefish', 'quagga', 'razorfish', 'snapper',
		'triggerfish', 'unicornfish', 'velvetfish', 'wrasse', 'xenoturbella', 'yelloweye', 'zander',
		'catamaran', 'barnaclebill', 'seaway', 'tideline', 'moonpool', 'starfish', 'tidepool', 'seamount', 'kelpbed', 'seastack',
		'windjammer', 'foghorn', 'seawaybill', 'tidechart', 'seaspray', 'tidemark', 'seaswell', 'tidestream', 'seafloor', 'searoute',
		'bluewhale', 'greensea', 'redalgae', 'blackcoral', 'whitesand', 'silverscale', 'goldenfin', 'purpleurchin', 'pinkshrimp', 'brownkelp',
		'coralreef', 'seadragon', 'seahorse', 'seacucumber', 'seaplane', 'seaslug', 'seasnake', 'seawolf', 'seabass', 'seabird',
		'iceberglet', 'tidalpool', 'tidalflat', 'tidalcurrent', 'tidalrange', 'tidalzone', 'tidalflow', 'tidalbore', 'tidalwavelet', 'tidalcrest',
		'kelpstrand', 'kelpblade', 'kelpanchor', 'kelpbulb', 'kelpfrond', 'kelpnode', 'kelpstipe', 'kelpbase', 'kelptip',
		'plankter', 'plankters', 'planktoniclarva', 'planktonicswarm', 'planktoniccloud', 'planktonicmass', 'planktonicdrift', 'planktoniczone', 'planktoniclayer', 'planktonicfield',
		'abyssalplain', 'abyssalzone', 'abyssaltrench', 'abyssalhill', 'abyssalcurrent', 'abyssalvent', 'abyssalridge', 'abyssalbasin', 'abyssaldepth', 'abyssalwater',
		'whalefall', 'seafog', 'kelpforestline', 'tidalmarsh', 'saltmarsh', 'mudflat', 'sandbar', 'spit', 'tombolo', 'barrierisland',
		'lagoonmouth', 'bayhead', 'baymouth', 'estuarine', 'fjordland', 'sound', 'bight', 'groyne', 'breakwater', 'revetment',
		'groin', 'riprap', 'jettison', 'tidalstream', 'tidalset', 'tidalreach', 'tidalebb', 'tidalflowline', 'tidalcrestline', 'tidaltrough',
		'beachrock', 'beachface', 'beachridge', 'beachdune', 'beachgrass', 'beachpea', 'beachrose', 'beachplum', 'beachcomber', 'beachwalker',
		'beachy', 'beachside', 'beachfront', 'beachhouse', 'beachwear', 'beachball', 'beachparty', 'beachgoer', 'beachscape', 'beachzone',
		'seafoam', 'seamist', 'seabreeze', 'seashells', 'seaglass', 'seawall', 'seawater', 'seaworthy', 'seawaypoint', 'seawayline',
		'sealane', 'seamark', 'seamouse', 'seapod', 'seapoint', 'searock', 'searoom', 'searover', 'seasalt', 'seasand',
		'seascape', 'seasense', 'seasight', 'seaslugging', 'seasound', 'seaspace', 'seasprayzone', 'seastone', 'seasurface', 'seaswellzone',
		'seatail', 'seatangle', 'seatide', 'seatoad', 'seatop', 'seatower', 'seatree', 'seatrench', 'seatrough', 'seatube',
		'seaurchin', 'seaview', 'seawallzone', 'seawaterline', 'seawave', 'seawind', 'seawolfish', 'seawood', 'seaworm', 'seawreck',
		'seayard', 'seazone', 'tidalarch', 'tidalbank', 'tidalbasin', 'tidalbeach', 'tidalbelt', 'tidalbluff', 'tidalbridge', 'tidalbrook',
		'tidalcanal', 'tidalchannel', 'tidalcliff', 'tidalcoast', 'tidalcove', 'tidalcreek', 'tidaldelta', 'tidalditch', 'tidaldrift', 'tidalestuary',
		'tidalflatland', 'tidalflowpath', 'tidalforest', 'tidalfresh', 'tidalgate', 'tidalgrove', 'tidalharbor', 'tidalhead', 'tidalhill', 'tidalice',
		'tidalisland', 'tidaljetty', 'tidallagoon', 'tidallake', 'tidalland', 'tidalledge', 'tidalline', 'tidallock', 'tidalmarshland', 'tidalmeadow',
		'tidalmoor', 'tidaloutlet', 'tidalpass', 'tidalpath', 'tidalpeak', 'tidalpier', 'tidalplain', 'tidalpond', 'tidalpoolzone', 'tidalport',
		'tidalquay', 'tidalreef', 'tidalridge', 'tidalriver', 'tidalroad', 'tidalrock', 'tidalrun', 'tidalsand', 'tidalshore', 'tidalslope',
		'tidalsound', 'tidalspit', 'tidalstrand', 'tidalstreambed', 'tidalswamp', 'tidaltide', 'tidaltower', 'tidalvalley', 'tidalwash', 'tidalway',
		'tidalwharf', 'tidalwood', 'tidalzoneedge', 'tidalzoneline', 'tidalzonetop', 'tidalzonetree', 'tidalzonetrough', 'tidalzonewater', 'tidalzonewind', 'tidalzonewood',
		'kelpforestcanopy', 'kelpforestfloor', 'kelpforestedge', 'kelpforestpatch', 'kelpforestzone', 'kelpforestreef', 'kelpforestrock', 'kelpforestbay', 'kelpforestcove', 'kelpforestlagoon',
		'kelpforestpool', 'kelpforestshoal', 'kelpforeststrand', 'kelpforesttidal', 'kelpforestwave', 'kelpforestwharf', 'kelpforestisle', 'kelpforestbank', 'kelpforestpoint', 'kelpforestcliff',
		'kelpforestgrove', 'kelpforestharbor', 'kelpforestpass', 'kelpforestpassage', 'kelpforestquay', 'kelpforestridge', 'kelpforestroad', 'kelpforestrun', 'kelpforeststream', 'kelpforestvalley',
		'kelpforestwash', 'kelpforestway', 'kelpforestzoneedge', 'kelpforestzoneline', 'kelpforestzonetop', 'kelpforestzonetree', 'kelpforestzonetrough', 'kelpforestzonewater', 'kelpforestzonewind', 'kelpforestzonewood',
		'abyssalarch', 'abyssalbank', 'abyssalbasinridge', 'abyssalbeach', 'abyssalbelt', 'abyssalbluff', 'abyssalbridge', 'abyssalbrook', 'abyssalcanal', 'abyssalchannel',
		'abyssalcliff', 'abyssalcoast', 'abyssalcove', 'abyssalcreek', 'abyssaldelta', 'abyssalditch', 'abyssaldrift', 'abyssalestuary', 'abyssalflatland', 'abyssalflowpath',
		'abyssalforest', 'abyssalfresh', 'abyssalgate', 'abyssalgrove', 'abyssalharbor', 'abyssalhead', 'abyssalhillock', 'abyssalice', 'abyssalisland', 'abyssaljetty',
		'abyssallagoon', 'abyssallake', 'abyssalland', 'abyssalledge', 'abyssalline', 'abyssallock', 'abyssalmarsh', 'abyssalmarshland', 'abyssalmeadow', 'abyssalmoor',
		'abyssaloutlet', 'abyssalpass', 'abyssalpath', 'abyssalpeak', 'abyssalpier', 'abyssalplainzone', 'abyssalpond', 'abyssalpool', 'abyssalport', 'abyssalquay',
		'abyssalreef', 'abyssalridgezone', 'abyssalriver', 'abyssalroad', 'abyssalrock', 'abyssalrun', 'abyssalsand', 'abyssalshore', 'abyssalslope', 'abyssalsound',
		'abyssalspit', 'abyssalstrand', 'abyssalstream', 'abyssalstreambed', 'abyssalswamp', 'abyssaltide', 'abyssaltower', 'abyssalvalley', 'abyssalwash', 'abyssalway',
		'abyssalwharf', 'abyssalwood', 'abyssalzoneedge', 'abyssalzoneline', 'abyssalzonetop', 'abyssalzonetree', 'abyssalzonetrough', 'abyssalzonewater', 'abyssalzonewind', 'abyssalzonewood',
		'planktonarch', 'planktonbank', 'planktonbasin', 'planktonbeach', 'planktonbelt', 'planktonbluff', 'planktonbridge', 'planktonbrook', 'planktoncanal', 'planktonchannel',
		'planktoncliff', 'planktoncoast', 'planktoncove', 'planktoncreek', 'planktondelta', 'planktonditch', 'planktondrift', 'planktonestuary', 'planktonflatland', 'planktonflowpath',
		'planktonforest', 'planktonfresh', 'planktongate', 'planktongrove', 'planktonharbor', 'planktonhead', 'planktonhill', 'planktonice', 'planktonisland', 'planktonjetty',
		'planktonlagoon', 'planktonlake', 'planktonland', 'planktonledge', 'planktonline', 'planktonlock', 'planktonmarsh', 'planktonmarshland', 'planktonmeadow', 'planktonmoor',
		'planktonoutlet', 'planktonpass', 'planktonpath', 'planktonpeak', 'planktonpier', 'planktonplain', 'planktonpond', 'planktonpool', 'planktonport', 'planktonquay',
		'planktonreef', 'planktonridge', 'planktonriver', 'planktonroad', 'planktonrock', 'planktonrun', 'planktonsand', 'planktonshore', 'planktonslope', 'planktonsound',
		'planktonspit', 'planktonstrand', 'planktonstream', 'planktonstreambed', 'planktonswamp', 'planktontide', 'planktontower', 'planktonvalley', 'planktonwash', 'planktonway',
		'planktonwharf', 'planktonwood', 'planktonzoneedge', 'planktonzoneline', 'planktonzonetop', 'planktonzonetree', 'planktonzonetrough', 'planktonzonewater', 'planktonzonewind', 'planktonzonewood',
		'coralarch', 'coralbank', 'coralbasin', 'coralbeach', 'coralbelt', 'coralbluff', 'coralbridge', 'coralbrook', 'coralcanal', 'coralchannel',
		'coralcliff', 'coralcoast', 'coralcove', 'coralcreek', 'coraldelta', 'coralditch', 'coraldrift', 'coralestuary', 'coralflatland', 'coralflowpath',
		'coralforest', 'coralfresh', 'coralgate', 'coralgrove', 'coralharbor', 'coralhead', 'coralhill', 'coralice', 'coralisland', 'coraljetty',
		'corallagoon', 'corallake', 'coralland', 'coralledge', 'coralline', 'corallock', 'coralmarsh', 'coralmarshland', 'coralmeadow', 'coralmoor',
		'coraloutlet', 'coralpass', 'coralpath', 'coralpeak', 'coralpier', 'coralplain', 'coralpond', 'coralpool', 'coralport', 'coralquay',
		'coralreefzone', 'coralridge', 'coralriver', 'coralroad', 'coralrock', 'coralrun', 'coralsand', 'coralshore', 'coralslope', 'coralsound',
		'coralspit', 'coralstrand', 'coralstream', 'coralstreambed', 'coralswamp', 'coraltide', 'coraltower', 'coralvalley', 'coralwash', 'coralway',
		'coralwharf', 'coralwood', 'coralzoneedge', 'coralzoneline', 'coralzonetop', 'coralzonetree', 'coralzonetrough', 'coralzonewater', 'coralzonewind', 'coralzonewood',
		'kelpmeadow', 'saltwaterfall', 'surfbreak', 'oceanpass', 'bluecurrent', 'mangroveroot', 'tideflower', 'driftalgae', 'moonkelp', 'gulfweed',
		'coralarchway', 'seacave', 'tidalwhirlpool', 'barnaclebay', 'starfishpoint', 'dolphinrun', 'whalecove', 'pelicanrock', 'sealionreef', 'otterstrand',
		'kelpforestpath', 'seadrift', 'tidalpooling', 'oceanmist', 'seashellbank', 'crabapple', 'turtlegrass', 'seadragonfly', 'clamgarden', 'oceanbloom',
		'kelpstrandline', 'seapebble', 'tidalarchway', 'mountain valley', 'musselrock', 'oceancrest', 'seaflower', 'kelpbluff', 'tidalpassage', 'seastarbank',
		'ahab', 'ishmael', 'queequeg', 'starbuck', 'stubb', 'flask', 'pequod', 'rachel', 'delight', 'jeroboam',
		'fedallah', 'daggoo', 'tashtego', 'pip', 'captain boomer', 'carpenter', 'blacksmith', 'perth', 'elijah', 'father mapple',
		'whalebone', 'spermaceti', 'ambergris', 'tryworks', 'crows nest', 'masthead', 'forecastle', 'mizzenmast', 'bowsprit', 'harpooneer',
		'blubber', 'spout', 'cachalot', 'leviathan', 'white whale', 'monomaniac', 'coffin', 'doubloon', 'gams', 'chase',
		'plank', 'typhoon', 'galehead', 'windward', 'lee shore', 'sailcloth', 'yard', 'reef patch', 'sounding', 'logline',
		'crow nest', 'sailmaker', 'shipkeeper', 'greenland', 'nantucket', 'new bedford', 'cape horn', 'sperm whale', 'right whale',
		'agile', 'git', 'docker', 'kubernetes', 'service', 'server', 'dev', 'blockchain', 'cloud', 'rest', 'frontend',
		'graphql', 'assembly', 'rtc', 'socket', 'worker', 'hook', 'storage', 'learning', 'intelligence', 'data',
		'typescript', 'python', 'ruby', 'swift', 'kotlin', 'rust', 'scala', 'elixir', 'clojure', 'haskell',
	];

	public static function get( string $type = 'all', int $limit = 99999 ) {
		$keywords = match ( $type ) {
			'all' => array_merge( self::BIKE_KEYWORDS, self::RANDOM_KEYWORDS ),
			'bike' => self::BIKE_KEYWORDS,
			'random' => self::RANDOM_KEYWORDS,
			default => throw new \Exception( 'Keyword type not supported.' ),
		};

		return array_slice( $keywords, 0, $limit );
	}

	public static function validetUniques() {
		$keywords = self::get();
		$unique_keywords = array_unique( $keywords );

		if ( count( $keywords ) !== count( $unique_keywords ) ) {
			$duplicates = array_diff_assoc( $keywords, $unique_keywords );
			throw new \RuntimeException( 'Duplicate keywords found: ' . implode(', ', $duplicates ) );
		}
	}
}
