<?php

namespace Symbiote\Components;

use SilverStripe\Core\Injector\Injector;
use SilverStripe\View\SSTemplateParser;

/*
WARNING: This file has been machine generated. Do not edit it, or your changes will be overwritten next time it is compiled.
*/




/**
 * NOTE(Jake): 2018-03-31
 *
 * We aren't using "trait" for this as overriding "protected" variables
 * from "Template" / "TopTemplate" blocks won't work in strict mode in
 * PHP versions 5.X
 */
class ComponentTemplateParser extends SSTemplateParser
{
    /* Template: (Comment | Translate | If | Require | CacheBlock | UncachedBlock | OldI18NTag | Include | ClosedBlock |
       OpenBlock | MalformedBlock | MalformedBracketInjection | Injection | Text | Component | ComponentSelfClosing)+ */
    protected $match_Template_typestack = array('Template');
    function match_Template ($stack = array()) {
    	$matchrule = "Template"; $result = $this->construct($matchrule, $matchrule, null);
    	$count = 0;
    	while (true) {
    		$res_62 = $result;
    		$pos_62 = $this->pos;
    		$_61 = NULL;
    		do {
    			$_59 = NULL;
    			do {
    				$res_0 = $result;
    				$pos_0 = $this->pos;
    				$matcher = 'match_'.'Comment'; $key = $matcher; $pos = $this->pos;
    				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    				if ($subres !== FALSE) {
    					$this->store( $result, $subres );
    					$_59 = TRUE; break;
    				}
    				$result = $res_0;
    				$this->pos = $pos_0;
    				$_57 = NULL;
    				do {
    					$res_2 = $result;
    					$pos_2 = $this->pos;
    					$matcher = 'match_'.'Translate'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    						$_57 = TRUE; break;
    					}
    					$result = $res_2;
    					$this->pos = $pos_2;
    					$_55 = NULL;
    					do {
    						$res_4 = $result;
    						$pos_4 = $this->pos;
    						$matcher = 'match_'.'If'; $key = $matcher; $pos = $this->pos;
    						$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    						if ($subres !== FALSE) {
    							$this->store( $result, $subres );
    							$_55 = TRUE; break;
    						}
    						$result = $res_4;
    						$this->pos = $pos_4;
    						$_53 = NULL;
    						do {
    							$res_6 = $result;
    							$pos_6 = $this->pos;
    							$matcher = 'match_'.'Require'; $key = $matcher; $pos = $this->pos;
    							$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    							if ($subres !== FALSE) {
    								$this->store( $result, $subres );
    								$_53 = TRUE; break;
    							}
    							$result = $res_6;
    							$this->pos = $pos_6;
    							$_51 = NULL;
    							do {
    								$res_8 = $result;
    								$pos_8 = $this->pos;
    								$matcher = 'match_'.'CacheBlock'; $key = $matcher; $pos = $this->pos;
    								$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    								if ($subres !== FALSE) {
    									$this->store( $result, $subres );
    									$_51 = TRUE; break;
    								}
    								$result = $res_8;
    								$this->pos = $pos_8;
    								$_49 = NULL;
    								do {
    									$res_10 = $result;
    									$pos_10 = $this->pos;
    									$matcher = 'match_'.'UncachedBlock'; $key = $matcher; $pos = $this->pos;
    									$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    									if ($subres !== FALSE) {
    										$this->store( $result, $subres );
    										$_49 = TRUE; break;
    									}
    									$result = $res_10;
    									$this->pos = $pos_10;
    									$_47 = NULL;
    									do {
    										$res_12 = $result;
    										$pos_12 = $this->pos;
    										$matcher = 'match_'.'OldI18NTag'; $key = $matcher; $pos = $this->pos;
    										$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    										if ($subres !== FALSE) {
    											$this->store( $result, $subres );
    											$_47 = TRUE; break;
    										}
    										$result = $res_12;
    										$this->pos = $pos_12;
    										$_45 = NULL;
    										do {
    											$res_14 = $result;
    											$pos_14 = $this->pos;
    											$matcher = 'match_'.'Include'; $key = $matcher; $pos = $this->pos;
    											$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    											if ($subres !== FALSE) {
    												$this->store( $result, $subres );
    												$_45 = TRUE; break;
    											}
    											$result = $res_14;
    											$this->pos = $pos_14;
    											$_43 = NULL;
    											do {
    												$res_16 = $result;
    												$pos_16 = $this->pos;
    												$matcher = 'match_'.'ClosedBlock'; $key = $matcher; $pos = $this->pos;
    												$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    												if ($subres !== FALSE) {
    													$this->store( $result, $subres );
    													$_43 = TRUE; break;
    												}
    												$result = $res_16;
    												$this->pos = $pos_16;
    												$_41 = NULL;
    												do {
    													$res_18 = $result;
    													$pos_18 = $this->pos;
    													$matcher = 'match_'.'OpenBlock'; $key = $matcher; $pos = $this->pos;
    													$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    													if ($subres !== FALSE) {
    														$this->store( $result, $subres );
    														$_41 = TRUE; break;
    													}
    													$result = $res_18;
    													$this->pos = $pos_18;
    													$_39 = NULL;
    													do {
    														$res_20 = $result;
    														$pos_20 = $this->pos;
    														$matcher = 'match_'.'MalformedBlock'; $key = $matcher; $pos = $this->pos;
    														$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    														if ($subres !== FALSE) {
    															$this->store( $result, $subres );
    															$_39 = TRUE; break;
    														}
    														$result = $res_20;
    														$this->pos = $pos_20;
    														$_37 = NULL;
    														do {
    															$res_22 = $result;
    															$pos_22 = $this->pos;
    															$matcher = 'match_'.'MalformedBracketInjection'; $key = $matcher; $pos = $this->pos;
    															$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    															if ($subres !== FALSE) {
    																$this->store( $result, $subres );
    																$_37 = TRUE; break;
    															}
    															$result = $res_22;
    															$this->pos = $pos_22;
    															$_35 = NULL;
    															do {
    																$res_24 = $result;
    																$pos_24 = $this->pos;
    																$matcher = 'match_'.'Injection'; $key = $matcher; $pos = $this->pos;
    																$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																if ($subres !== FALSE) {
    																	$this->store( $result, $subres );
    																	$_35 = TRUE; break;
    																}
    																$result = $res_24;
    																$this->pos = $pos_24;
    																$_33 = NULL;
    																do {
    																	$res_26 = $result;
    																	$pos_26 = $this->pos;
    																	$matcher = 'match_'.'Text'; $key = $matcher; $pos = $this->pos;
    																	$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																	if ($subres !== FALSE) {
    																		$this->store( $result, $subres );
    																		$_33 = TRUE; break;
    																	}
    																	$result = $res_26;
    																	$this->pos = $pos_26;
    																	$_31 = NULL;
    																	do {
    																		$res_28 = $result;
    																		$pos_28 = $this->pos;
    																		$matcher = 'match_'.'Component'; $key = $matcher; $pos = $this->pos;
    																		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																		if ($subres !== FALSE) {
    																			$this->store( $result, $subres );
    																			$_31 = TRUE; break;
    																		}
    																		$result = $res_28;
    																		$this->pos = $pos_28;
    																		$matcher = 'match_'.'ComponentSelfClosing'; $key = $matcher; $pos = $this->pos;
    																		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																		if ($subres !== FALSE) {
    																			$this->store( $result, $subres );
    																			$_31 = TRUE; break;
    																		}
    																		$result = $res_28;
    																		$this->pos = $pos_28;
    																		$_31 = FALSE; break;
    																	}
    																	while(0);
    																	if( $_31 === TRUE ) {
    																		$_33 = TRUE; break;
    																	}
    																	$result = $res_26;
    																	$this->pos = $pos_26;
    																	$_33 = FALSE; break;
    																}
    																while(0);
    																if( $_33 === TRUE ) {
    																	$_35 = TRUE; break;
    																}
    																$result = $res_24;
    																$this->pos = $pos_24;
    																$_35 = FALSE; break;
    															}
    															while(0);
    															if( $_35 === TRUE ) { $_37 = TRUE; break; }
    															$result = $res_22;
    															$this->pos = $pos_22;
    															$_37 = FALSE; break;
    														}
    														while(0);
    														if( $_37 === TRUE ) { $_39 = TRUE; break; }
    														$result = $res_20;
    														$this->pos = $pos_20;
    														$_39 = FALSE; break;
    													}
    													while(0);
    													if( $_39 === TRUE ) { $_41 = TRUE; break; }
    													$result = $res_18;
    													$this->pos = $pos_18;
    													$_41 = FALSE; break;
    												}
    												while(0);
    												if( $_41 === TRUE ) { $_43 = TRUE; break; }
    												$result = $res_16;
    												$this->pos = $pos_16;
    												$_43 = FALSE; break;
    											}
    											while(0);
    											if( $_43 === TRUE ) { $_45 = TRUE; break; }
    											$result = $res_14;
    											$this->pos = $pos_14;
    											$_45 = FALSE; break;
    										}
    										while(0);
    										if( $_45 === TRUE ) { $_47 = TRUE; break; }
    										$result = $res_12;
    										$this->pos = $pos_12;
    										$_47 = FALSE; break;
    									}
    									while(0);
    									if( $_47 === TRUE ) { $_49 = TRUE; break; }
    									$result = $res_10;
    									$this->pos = $pos_10;
    									$_49 = FALSE; break;
    								}
    								while(0);
    								if( $_49 === TRUE ) { $_51 = TRUE; break; }
    								$result = $res_8;
    								$this->pos = $pos_8;
    								$_51 = FALSE; break;
    							}
    							while(0);
    							if( $_51 === TRUE ) { $_53 = TRUE; break; }
    							$result = $res_6;
    							$this->pos = $pos_6;
    							$_53 = FALSE; break;
    						}
    						while(0);
    						if( $_53 === TRUE ) { $_55 = TRUE; break; }
    						$result = $res_4;
    						$this->pos = $pos_4;
    						$_55 = FALSE; break;
    					}
    					while(0);
    					if( $_55 === TRUE ) { $_57 = TRUE; break; }
    					$result = $res_2;
    					$this->pos = $pos_2;
    					$_57 = FALSE; break;
    				}
    				while(0);
    				if( $_57 === TRUE ) { $_59 = TRUE; break; }
    				$result = $res_0;
    				$this->pos = $pos_0;
    				$_59 = FALSE; break;
    			}
    			while(0);
    			if( $_59 === FALSE) { $_61 = FALSE; break; }
    			$_61 = TRUE; break;
    		}
    		while(0);
    		if( $_61 === FALSE) {
    			$result = $res_62;
    			$this->pos = $pos_62;
    			unset( $res_62 );
    			unset( $pos_62 );
    			break;
    		}
    		$count += 1;
    	}
    	if ($count > 0) { return $this->finalise($result); }
    	else { return FALSE; }
    }




    /* TopTemplate: (Comment | Translate | If | Require | CacheBlock | UncachedBlock | OldI18NTag | Include | ClosedBlock |
       OpenBlock |  MalformedBlock | MismatchedEndBlock  | MalformedBracketInjection | Injection | Text | Component | ComponentSelfClosing)+ */
    protected $match_TopTemplate_typestack = array('TopTemplate','Template');
    function match_TopTemplate ($stack = array()) {
    	$matchrule = "TopTemplate"; $result = $this->construct($matchrule, $matchrule, array('TemplateMatcher' => 'Template'));
    	$count = 0;
    	while (true) {
    		$res_129 = $result;
    		$pos_129 = $this->pos;
    		$_128 = NULL;
    		do {
    			$_126 = NULL;
    			do {
    				$res_63 = $result;
    				$pos_63 = $this->pos;
    				$matcher = 'match_'.'Comment'; $key = $matcher; $pos = $this->pos;
    				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    				if ($subres !== FALSE) {
    					$this->store( $result, $subres );
    					$_126 = TRUE; break;
    				}
    				$result = $res_63;
    				$this->pos = $pos_63;
    				$_124 = NULL;
    				do {
    					$res_65 = $result;
    					$pos_65 = $this->pos;
    					$matcher = 'match_'.'Translate'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    						$_124 = TRUE; break;
    					}
    					$result = $res_65;
    					$this->pos = $pos_65;
    					$_122 = NULL;
    					do {
    						$res_67 = $result;
    						$pos_67 = $this->pos;
    						$matcher = 'match_'.'If'; $key = $matcher; $pos = $this->pos;
    						$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    						if ($subres !== FALSE) {
    							$this->store( $result, $subres );
    							$_122 = TRUE; break;
    						}
    						$result = $res_67;
    						$this->pos = $pos_67;
    						$_120 = NULL;
    						do {
    							$res_69 = $result;
    							$pos_69 = $this->pos;
    							$matcher = 'match_'.'Require'; $key = $matcher; $pos = $this->pos;
    							$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    							if ($subres !== FALSE) {
    								$this->store( $result, $subres );
    								$_120 = TRUE; break;
    							}
    							$result = $res_69;
    							$this->pos = $pos_69;
    							$_118 = NULL;
    							do {
    								$res_71 = $result;
    								$pos_71 = $this->pos;
    								$matcher = 'match_'.'CacheBlock'; $key = $matcher; $pos = $this->pos;
    								$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    								if ($subres !== FALSE) {
    									$this->store( $result, $subres );
    									$_118 = TRUE; break;
    								}
    								$result = $res_71;
    								$this->pos = $pos_71;
    								$_116 = NULL;
    								do {
    									$res_73 = $result;
    									$pos_73 = $this->pos;
    									$matcher = 'match_'.'UncachedBlock'; $key = $matcher; $pos = $this->pos;
    									$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    									if ($subres !== FALSE) {
    										$this->store( $result, $subres );
    										$_116 = TRUE; break;
    									}
    									$result = $res_73;
    									$this->pos = $pos_73;
    									$_114 = NULL;
    									do {
    										$res_75 = $result;
    										$pos_75 = $this->pos;
    										$matcher = 'match_'.'OldI18NTag'; $key = $matcher; $pos = $this->pos;
    										$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    										if ($subres !== FALSE) {
    											$this->store( $result, $subres );
    											$_114 = TRUE; break;
    										}
    										$result = $res_75;
    										$this->pos = $pos_75;
    										$_112 = NULL;
    										do {
    											$res_77 = $result;
    											$pos_77 = $this->pos;
    											$matcher = 'match_'.'Include'; $key = $matcher; $pos = $this->pos;
    											$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    											if ($subres !== FALSE) {
    												$this->store( $result, $subres );
    												$_112 = TRUE; break;
    											}
    											$result = $res_77;
    											$this->pos = $pos_77;
    											$_110 = NULL;
    											do {
    												$res_79 = $result;
    												$pos_79 = $this->pos;
    												$matcher = 'match_'.'ClosedBlock'; $key = $matcher; $pos = $this->pos;
    												$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    												if ($subres !== FALSE) {
    													$this->store( $result, $subres );
    													$_110 = TRUE; break;
    												}
    												$result = $res_79;
    												$this->pos = $pos_79;
    												$_108 = NULL;
    												do {
    													$res_81 = $result;
    													$pos_81 = $this->pos;
    													$matcher = 'match_'.'OpenBlock'; $key = $matcher; $pos = $this->pos;
    													$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    													if ($subres !== FALSE) {
    														$this->store( $result, $subres );
    														$_108 = TRUE; break;
    													}
    													$result = $res_81;
    													$this->pos = $pos_81;
    													$_106 = NULL;
    													do {
    														$res_83 = $result;
    														$pos_83 = $this->pos;
    														$matcher = 'match_'.'MalformedBlock'; $key = $matcher; $pos = $this->pos;
    														$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    														if ($subres !== FALSE) {
    															$this->store( $result, $subres );
    															$_106 = TRUE; break;
    														}
    														$result = $res_83;
    														$this->pos = $pos_83;
    														$_104 = NULL;
    														do {
    															$res_85 = $result;
    															$pos_85 = $this->pos;
    															$matcher = 'match_'.'MismatchedEndBlock'; $key = $matcher; $pos = $this->pos;
    															$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    															if ($subres !== FALSE) {
    																$this->store( $result, $subres );
    																$_104 = TRUE; break;
    															}
    															$result = $res_85;
    															$this->pos = $pos_85;
    															$_102 = NULL;
    															do {
    																$res_87 = $result;
    																$pos_87 = $this->pos;
    																$matcher = 'match_'.'MalformedBracketInjection'; $key = $matcher; $pos = $this->pos;
    																$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																if ($subres !== FALSE) {
    																	$this->store( $result, $subres );
    																	$_102 = TRUE; break;
    																}
    																$result = $res_87;
    																$this->pos = $pos_87;
    																$_100 = NULL;
    																do {
    																	$res_89 = $result;
    																	$pos_89 = $this->pos;
    																	$matcher = 'match_'.'Injection'; $key = $matcher; $pos = $this->pos;
    																	$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																	if ($subres !== FALSE) {
    																		$this->store( $result, $subres );
    																		$_100 = TRUE; break;
    																	}
    																	$result = $res_89;
    																	$this->pos = $pos_89;
    																	$_98 = NULL;
    																	do {
    																		$res_91 = $result;
    																		$pos_91 = $this->pos;
    																		$matcher = 'match_'.'Text'; $key = $matcher; $pos = $this->pos;
    																		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																		if ($subres !== FALSE) {
    																			$this->store( $result, $subres );
    																			$_98 = TRUE; break;
    																		}
    																		$result = $res_91;
    																		$this->pos = $pos_91;
    																		$_96 = NULL;
    																		do {
    																			$res_93 = $result;
    																			$pos_93 = $this->pos;
    																			$matcher = 'match_'.'Component'; $key = $matcher; $pos = $this->pos;
    																			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																			if ($subres !== FALSE) {
    																				$this->store( $result, $subres );
    																				$_96 = TRUE; break;
    																			}
    																			$result = $res_93;
    																			$this->pos = $pos_93;
    																			$matcher = 'match_'.'ComponentSelfClosing'; $key = $matcher; $pos = $this->pos;
    																			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    																			if ($subres !== FALSE) {
    																				$this->store( $result, $subres );
    																				$_96 = TRUE; break;
    																			}
    																			$result = $res_93;
    																			$this->pos = $pos_93;
    																			$_96 = FALSE; break;
    																		}
    																		while(0);
    																		if( $_96 === TRUE ) {
    																			$_98 = TRUE; break;
    																		}
    																		$result = $res_91;
    																		$this->pos = $pos_91;
    																		$_98 = FALSE; break;
    																	}
    																	while(0);
    																	if( $_98 === TRUE ) {
    																		$_100 = TRUE; break;
    																	}
    																	$result = $res_89;
    																	$this->pos = $pos_89;
    																	$_100 = FALSE; break;
    																}
    																while(0);
    																if( $_100 === TRUE ) {
    																	$_102 = TRUE; break;
    																}
    																$result = $res_87;
    																$this->pos = $pos_87;
    																$_102 = FALSE; break;
    															}
    															while(0);
    															if( $_102 === TRUE ) {
    																$_104 = TRUE; break;
    															}
    															$result = $res_85;
    															$this->pos = $pos_85;
    															$_104 = FALSE; break;
    														}
    														while(0);
    														if( $_104 === TRUE ) { $_106 = TRUE; break; }
    														$result = $res_83;
    														$this->pos = $pos_83;
    														$_106 = FALSE; break;
    													}
    													while(0);
    													if( $_106 === TRUE ) { $_108 = TRUE; break; }
    													$result = $res_81;
    													$this->pos = $pos_81;
    													$_108 = FALSE; break;
    												}
    												while(0);
    												if( $_108 === TRUE ) { $_110 = TRUE; break; }
    												$result = $res_79;
    												$this->pos = $pos_79;
    												$_110 = FALSE; break;
    											}
    											while(0);
    											if( $_110 === TRUE ) { $_112 = TRUE; break; }
    											$result = $res_77;
    											$this->pos = $pos_77;
    											$_112 = FALSE; break;
    										}
    										while(0);
    										if( $_112 === TRUE ) { $_114 = TRUE; break; }
    										$result = $res_75;
    										$this->pos = $pos_75;
    										$_114 = FALSE; break;
    									}
    									while(0);
    									if( $_114 === TRUE ) { $_116 = TRUE; break; }
    									$result = $res_73;
    									$this->pos = $pos_73;
    									$_116 = FALSE; break;
    								}
    								while(0);
    								if( $_116 === TRUE ) { $_118 = TRUE; break; }
    								$result = $res_71;
    								$this->pos = $pos_71;
    								$_118 = FALSE; break;
    							}
    							while(0);
    							if( $_118 === TRUE ) { $_120 = TRUE; break; }
    							$result = $res_69;
    							$this->pos = $pos_69;
    							$_120 = FALSE; break;
    						}
    						while(0);
    						if( $_120 === TRUE ) { $_122 = TRUE; break; }
    						$result = $res_67;
    						$this->pos = $pos_67;
    						$_122 = FALSE; break;
    					}
    					while(0);
    					if( $_122 === TRUE ) { $_124 = TRUE; break; }
    					$result = $res_65;
    					$this->pos = $pos_65;
    					$_124 = FALSE; break;
    				}
    				while(0);
    				if( $_124 === TRUE ) { $_126 = TRUE; break; }
    				$result = $res_63;
    				$this->pos = $pos_63;
    				$_126 = FALSE; break;
    			}
    			while(0);
    			if( $_126 === FALSE) { $_128 = FALSE; break; }
    			$_128 = TRUE; break;
    		}
    		while(0);
    		if( $_128 === FALSE) {
    			$result = $res_129;
    			$this->pos = $pos_129;
    			unset( $res_129 );
    			unset( $pos_129 );
    			break;
    		}
    		$count += 1;
    	}
    	if ($count > 0) { return $this->finalise($result); }
    	else { return FALSE; }
    }




    /* NamedArgument: Name:Word "=" Value:Argument */
    protected $match_NamedArgument_typestack = array('NamedArgument');
    function match_NamedArgument ($stack = array()) {
    	$matchrule = "NamedArgument"; $result = $this->construct($matchrule, $matchrule, null);
    	$_133 = NULL;
    	do {
    		$matcher = 'match_'.'Word'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "Name" );
    		}
    		else { $_133 = FALSE; break; }
    		if (substr($this->string ?? '',$this->pos ?? 0,1) == '=') {
    			$this->pos += 1;
    			$result["text"] .= '=';
    		}
    		else { $_133 = FALSE; break; }
    		$matcher = 'match_'.'Argument'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "Value" );
    		}
    		else { $_133 = FALSE; break; }
    		$_133 = TRUE; break;
    	}
    	while(0);
    	if( $_133 === TRUE ) { return $this->finalise($result); }
    	if( $_133 === FALSE) { return FALSE; }
    }




    /* ComposedArgumentString: / (\\\\ | \\. | [^$q\\]) / */
    protected $match_ComposedArgumentString_typestack = array('ComposedArgumentString');
    function match_ComposedArgumentString ($stack = array()) {
    	$matchrule = "ComposedArgumentString"; $result = $this->construct($matchrule, $matchrule, null);
    	if (( $subres = $this->rx( '/ (\\\\\\\\ | \\\\. | [^'.$this->expression($result, $stack, 'q').'\\\\]) /' ) ) !== FALSE) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return FALSE; }
    }


    /* ComposedArgumentInjection: BracketInjection | SimpleInjection | If */
    protected $match_ComposedArgumentInjection_typestack = array('ComposedArgumentInjection');
    function match_ComposedArgumentInjection ($stack = array()) {
    	$matchrule = "ComposedArgumentInjection"; $result = $this->construct($matchrule, $matchrule, null);
    	$_143 = NULL;
    	do {
    		$res_136 = $result;
    		$pos_136 = $this->pos;
    		$matcher = 'match_'.'BracketInjection'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    			$_143 = TRUE; break;
    		}
    		$result = $res_136;
    		$this->pos = $pos_136;
    		$_141 = NULL;
    		do {
    			$res_138 = $result;
    			$pos_138 = $this->pos;
    			$matcher = 'match_'.'SimpleInjection'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres );
    				$_141 = TRUE; break;
    			}
    			$result = $res_138;
    			$this->pos = $pos_138;
    			$matcher = 'match_'.'If'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres );
    				$_141 = TRUE; break;
    			}
    			$result = $res_138;
    			$this->pos = $pos_138;
    			$_141 = FALSE; break;
    		}
    		while(0);
    		if( $_141 === TRUE ) { $_143 = TRUE; break; }
    		$result = $res_136;
    		$this->pos = $pos_136;
    		$_143 = FALSE; break;
    	}
    	while(0);
    	if( $_143 === TRUE ) { return $this->finalise($result); }
    	if( $_143 === FALSE) { return FALSE; }
    }


    /* ComposedArgumentQuotedString: q:/['"]/ ( ComposedArgumentInjection | ComposedArgumentString )* '$q' */
    protected $match_ComposedArgumentQuotedString_typestack = array('ComposedArgumentQuotedString');
    function match_ComposedArgumentQuotedString ($stack = array()) {
    	$matchrule = "ComposedArgumentQuotedString"; $result = $this->construct($matchrule, $matchrule, null);
    	$_154 = NULL;
    	do {
    		$stack[] = $result; $result = $this->construct( $matchrule, "q" );
    		if (( $subres = $this->rx( '/[\'"]/' ) ) !== FALSE) {
    			$result["text"] .= $subres;
    			$subres = $result; $result = array_pop($stack);
    			$this->store( $result, $subres, 'q' );
    		}
    		else {
    			$result = array_pop($stack);
    			$_154 = FALSE; break;
    		}
    		while (true) {
    			$res_152 = $result;
    			$pos_152 = $this->pos;
    			$_151 = NULL;
    			do {
    				$_149 = NULL;
    				do {
    					$res_146 = $result;
    					$pos_146 = $this->pos;
    					$matcher = 'match_'.'ComposedArgumentInjection'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    						$_149 = TRUE; break;
    					}
    					$result = $res_146;
    					$this->pos = $pos_146;
    					$matcher = 'match_'.'ComposedArgumentString'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    						$_149 = TRUE; break;
    					}
    					$result = $res_146;
    					$this->pos = $pos_146;
    					$_149 = FALSE; break;
    				}
    				while(0);
    				if( $_149 === FALSE) { $_151 = FALSE; break; }
    				$_151 = TRUE; break;
    			}
    			while(0);
    			if( $_151 === FALSE) {
    				$result = $res_152;
    				$this->pos = $pos_152;
    				unset( $res_152 );
    				unset( $pos_152 );
    				break;
    			}
    		}
    		if (( $subres = $this->literal( ''.$this->expression($result, $stack, 'q').'' ) ) !== FALSE) { $result["text"] .= $subres; }
    		else { $_154 = FALSE; break; }
    		$_154 = TRUE; break;
    	}
    	while(0);
    	if( $_154 === TRUE ) { return $this->finalise($result); }
    	if( $_154 === FALSE) { return FALSE; }
    }


    /* Argument:
    :DollarMarkedLookup |
    :QuotedString |
    :Null |
    :Boolean |
    :IntegerOrFloat |
    :Lookup !(< FreeString)|
    :FreeString */
    protected $match_Argument_typestack = array('Argument');
    function match_Argument ($stack = array()) {
    	$matchrule = "Argument"; $result = $this->construct($matchrule, $matchrule, null);
    	$_185 = NULL;
    	do {
    		$res_156 = $result;
    		$pos_156 = $this->pos;
    		$matcher = 'match_'.'DollarMarkedLookup'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "DollarMarkedLookup" );
    			$_185 = TRUE; break;
    		}
    		$result = $res_156;
    		$this->pos = $pos_156;
    		$_183 = NULL;
    		do {
    			$res_158 = $result;
    			$pos_158 = $this->pos;
    			$matcher = 'match_'.'QuotedString'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres, "QuotedString" );
    				$_183 = TRUE; break;
    			}
    			$result = $res_158;
    			$this->pos = $pos_158;
    			$_181 = NULL;
    			do {
    				$res_160 = $result;
    				$pos_160 = $this->pos;
    				$matcher = 'match_'.'Null'; $key = $matcher; $pos = $this->pos;
    				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    				if ($subres !== FALSE) {
    					$this->store( $result, $subres, "Null" );
    					$_181 = TRUE; break;
    				}
    				$result = $res_160;
    				$this->pos = $pos_160;
    				$_179 = NULL;
    				do {
    					$res_162 = $result;
    					$pos_162 = $this->pos;
    					$matcher = 'match_'.'Boolean'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres, "Boolean" );
    						$_179 = TRUE; break;
    					}
    					$result = $res_162;
    					$this->pos = $pos_162;
    					$_177 = NULL;
    					do {
    						$res_164 = $result;
    						$pos_164 = $this->pos;
    						$matcher = 'match_'.'IntegerOrFloat'; $key = $matcher; $pos = $this->pos;
    						$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    						if ($subres !== FALSE) {
    							$this->store( $result, $subres, "IntegerOrFloat" );
    							$_177 = TRUE; break;
    						}
    						$result = $res_164;
    						$this->pos = $pos_164;
    						$_175 = NULL;
    						do {
    							$res_166 = $result;
    							$pos_166 = $this->pos;
    							$_172 = NULL;
    							do {
    								$matcher = 'match_'.'Lookup'; $key = $matcher; $pos = $this->pos;
    								$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    								if ($subres !== FALSE) {
    									$this->store( $result, $subres, "Lookup" );
    								}
    								else { $_172 = FALSE; break; }
    								$res_171 = $result;
    								$pos_171 = $this->pos;
    								$_170 = NULL;
    								do {
    									if (( $subres = $this->whitespace(  ) ) !== FALSE) {
    										$result["text"] .= $subres;
    									}
    									$matcher = 'match_'.'FreeString'; $key = $matcher; $pos = $this->pos;
    									$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    									if ($subres !== FALSE) {
    										$this->store( $result, $subres );
    									}
    									else { $_170 = FALSE; break; }
    									$_170 = TRUE; break;
    								}
    								while(0);
    								if( $_170 === TRUE ) {
    									$result = $res_171;
    									$this->pos = $pos_171;
    									$_172 = FALSE; break;
    								}
    								if( $_170 === FALSE) {
    									$result = $res_171;
    									$this->pos = $pos_171;
    								}
    								$_172 = TRUE; break;
    							}
    							while(0);
    							if( $_172 === TRUE ) { $_175 = TRUE; break; }
    							$result = $res_166;
    							$this->pos = $pos_166;
    							$matcher = 'match_'.'FreeString'; $key = $matcher; $pos = $this->pos;
    							$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    							if ($subres !== FALSE) {
    								$this->store( $result, $subres, "FreeString" );
    								$_175 = TRUE; break;
    							}
    							$result = $res_166;
    							$this->pos = $pos_166;
    							$_175 = FALSE; break;
    						}
    						while(0);
    						if( $_175 === TRUE ) { $_177 = TRUE; break; }
    						$result = $res_164;
    						$this->pos = $pos_164;
    						$_177 = FALSE; break;
    					}
    					while(0);
    					if( $_177 === TRUE ) { $_179 = TRUE; break; }
    					$result = $res_162;
    					$this->pos = $pos_162;
    					$_179 = FALSE; break;
    				}
    				while(0);
    				if( $_179 === TRUE ) { $_181 = TRUE; break; }
    				$result = $res_160;
    				$this->pos = $pos_160;
    				$_181 = FALSE; break;
    			}
    			while(0);
    			if( $_181 === TRUE ) { $_183 = TRUE; break; }
    			$result = $res_158;
    			$this->pos = $pos_158;
    			$_183 = FALSE; break;
    		}
    		while(0);
    		if( $_183 === TRUE ) { $_185 = TRUE; break; }
    		$result = $res_156;
    		$this->pos = $pos_156;
    		$_185 = FALSE; break;
    	}
    	while(0);
    	if( $_185 === TRUE ) { return $this->finalise($result); }
    	if( $_185 === FALSE) { return FALSE; }
    }


    /* ComposedArgument:
    '{' < :IfArgument > '}' |
    :DollarMarkedLookup |
    :ComposedArgumentQuotedString |
    :Lookup !(< FreeString)|
    :FreeString */
    protected $match_ComposedArgument_typestack = array('ComposedArgument','Argument');
    function match_ComposedArgument ($stack = array()) {
    	$matchrule = "ComposedArgument"; $result = $this->construct($matchrule, $matchrule, null);
    	$_214 = NULL;
    	do {
    		$res_187 = $result;
    		$pos_187 = $this->pos;
    		$_193 = NULL;
    		do {
    			if (substr($this->string ?? '',$this->pos ?? 0,1) == '{') {
    				$this->pos += 1;
    				$result["text"] .= '{';
    			}
    			else { $_193 = FALSE; break; }
    			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    			$matcher = 'match_'.'IfArgument'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres, "IfArgument" );
    			}
    			else { $_193 = FALSE; break; }
    			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    			if (substr($this->string ?? '',$this->pos ?? 0,1) == '}') {
    				$this->pos += 1;
    				$result["text"] .= '}';
    			}
    			else { $_193 = FALSE; break; }
    			$_193 = TRUE; break;
    		}
    		while(0);
    		if( $_193 === TRUE ) { $_214 = TRUE; break; }
    		$result = $res_187;
    		$this->pos = $pos_187;
    		$_212 = NULL;
    		do {
    			$res_195 = $result;
    			$pos_195 = $this->pos;
    			$matcher = 'match_'.'DollarMarkedLookup'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres, "DollarMarkedLookup" );
    				$_212 = TRUE; break;
    			}
    			$result = $res_195;
    			$this->pos = $pos_195;
    			$_210 = NULL;
    			do {
    				$res_197 = $result;
    				$pos_197 = $this->pos;
    				$matcher = 'match_'.'ComposedArgumentQuotedString'; $key = $matcher; $pos = $this->pos;
    				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    				if ($subres !== FALSE) {
    					$this->store( $result, $subres, "ComposedArgumentQuotedString" );
    					$_210 = TRUE; break;
    				}
    				$result = $res_197;
    				$this->pos = $pos_197;
    				$_208 = NULL;
    				do {
    					$res_199 = $result;
    					$pos_199 = $this->pos;
    					$_205 = NULL;
    					do {
    						$matcher = 'match_'.'Lookup'; $key = $matcher; $pos = $this->pos;
    						$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    						if ($subres !== FALSE) {
    							$this->store( $result, $subres, "Lookup" );
    						}
    						else { $_205 = FALSE; break; }
    						$res_204 = $result;
    						$pos_204 = $this->pos;
    						$_203 = NULL;
    						do {
    							if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    							$matcher = 'match_'.'FreeString'; $key = $matcher; $pos = $this->pos;
    							$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    							if ($subres !== FALSE) {
    								$this->store( $result, $subres );
    							}
    							else { $_203 = FALSE; break; }
    							$_203 = TRUE; break;
    						}
    						while(0);
    						if( $_203 === TRUE ) {
    							$result = $res_204;
    							$this->pos = $pos_204;
    							$_205 = FALSE; break;
    						}
    						if( $_203 === FALSE) {
    							$result = $res_204;
    							$this->pos = $pos_204;
    						}
    						$_205 = TRUE; break;
    					}
    					while(0);
    					if( $_205 === TRUE ) { $_208 = TRUE; break; }
    					$result = $res_199;
    					$this->pos = $pos_199;
    					$matcher = 'match_'.'FreeString'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres, "FreeString" );
    						$_208 = TRUE; break;
    					}
    					$result = $res_199;
    					$this->pos = $pos_199;
    					$_208 = FALSE; break;
    				}
    				while(0);
    				if( $_208 === TRUE ) { $_210 = TRUE; break; }
    				$result = $res_197;
    				$this->pos = $pos_197;
    				$_210 = FALSE; break;
    			}
    			while(0);
    			if( $_210 === TRUE ) { $_212 = TRUE; break; }
    			$result = $res_195;
    			$this->pos = $pos_195;
    			$_212 = FALSE; break;
    		}
    		while(0);
    		if( $_212 === TRUE ) { $_214 = TRUE; break; }
    		$result = $res_187;
    		$this->pos = $pos_187;
    		$_214 = FALSE; break;
    	}
    	while(0);
    	if( $_214 === TRUE ) { return $this->finalise($result); }
    	if( $_214 === FALSE) { return FALSE; }
    }



    function ComposedArgumentInjection_STR(&$res, $sub)
    {
        $obj = str_replace('$$FINAL', 'obj', $sub['Lookup']['php']) . '->self()';
        // NOTE: CFP == Component Field Part
        $res['php'] = "'[_CFP]".$obj."[_CFP]'";
    }

    function ComposedArgumentInjection_If(&$res, $sub)
    {
        $res['php'] = <<<PHP
' [_CPB] {$sub['php']} [_CPB] '
PHP;
    }

    function ComposedArgumentQuotedString_ComposedArgumentString(&$res, $sub)
    {
        $res['php'] .= str_replace(array("\\", "'"), array("\\\\", "\\'"), $sub['text']);
    }

    function ComposedArgumentQuotedString_ComposedArgumentInjection(&$res, $sub)
    {
        $res['php'] .= $sub['php'];
    }

    function ComposedArgument_ComposedArgumentQuotedString(&$res, $sub)
    {
        $res['ArgumentMode'] = 'string';
        $php = $sub['php'];
        $res['php'] = "'" . $php . "'";
    }

    function ComposedArgument_IfArgument(&$res, $sub)
    {
        $res['ArgumentMode'] = 'string';
        $res['php'] = $sub['php'];
    }


    /* ComposeWord: / [A-Za-z_] [A-Za-z0-9_\-]* / */
    protected $match_ComposeWord_typestack = array('ComposeWord');
    function match_ComposeWord ($stack = array()) {
    	$matchrule = "ComposeWord"; $result = $this->construct($matchrule, $matchrule, null);
    	if (( $subres = $this->rx( '/ [A-Za-z_] [A-Za-z0-9_\-]* /' ) ) !== FALSE) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return FALSE; }
    }


    /* ComposedNamedArgument: Name:ComposeWord "=" Value:ComposedArgument */
    protected $match_ComposedNamedArgument_typestack = array('ComposedNamedArgument','NamedArgument');
    function match_ComposedNamedArgument ($stack = array()) {
    	$matchrule = "ComposedNamedArgument"; $result = $this->construct($matchrule, $matchrule, null);
    	$_220 = NULL;
    	do {
    		$matcher = 'match_'.'ComposeWord'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "Name" );
    		}
    		else { $_220 = FALSE; break; }
    		if (substr($this->string ?? '',$this->pos ?? 0,1) == '=') {
    			$this->pos += 1;
    			$result["text"] .= '=';
    		}
    		else { $_220 = FALSE; break; }
    		$matcher = 'match_'.'ComposedArgument'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "Value" );
    		}
    		else { $_220 = FALSE; break; }
    		$_220 = TRUE; break;
    	}
    	while(0);
    	if( $_220 === TRUE ) { return $this->finalise($result); }
    	if( $_220 === FALSE) { return FALSE; }
    }




    /* N: / [\s\n]* / */
    protected $match_N_typestack = array('N');
    function match_N ($stack = array()) {
    	$matchrule = "N"; $result = $this->construct($matchrule, $matchrule, null);
    	if (( $subres = $this->rx( '/ [\s\n]* /' ) ) !== FALSE) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return FALSE; }
    }


    /* Component: '<:' ComponentName:Word N < (ComposedNamedArgument ( N < ComposedNamedArgument N < )*)? N < N '>' Children:$TemplateMatcher?
    '</:' N < '$ComponentName' N < '>' */
    protected $match_Component_typestack = array('Component');
    function match_Component ($stack = array()) {
    	$matchrule = "Component"; $result = $this->construct($matchrule, $matchrule, null);
    	$_249 = NULL;
    	do {
    		if (( $subres = $this->literal( '<:' ) ) !== FALSE) { $result["text"] .= $subres; }
    		else { $_249 = FALSE; break; }
    		$matcher = 'match_'.'Word'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "ComponentName" );
    		}
    		else { $_249 = FALSE; break; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_249 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		$res_236 = $result;
    		$pos_236 = $this->pos;
    		$_235 = NULL;
    		do {
    			$matcher = 'match_'.'ComposedNamedArgument'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres );
    			}
    			else { $_235 = FALSE; break; }
    			while (true) {
    				$res_234 = $result;
    				$pos_234 = $this->pos;
    				$_233 = NULL;
    				do {
    					$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    					}
    					else { $_233 = FALSE; break; }
    					if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    					$matcher = 'match_'.'ComposedNamedArgument'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    					}
    					else { $_233 = FALSE; break; }
    					$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    					}
    					else { $_233 = FALSE; break; }
    					if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    					$_233 = TRUE; break;
    				}
    				while(0);
    				if( $_233 === FALSE) {
    					$result = $res_234;
    					$this->pos = $pos_234;
    					unset( $res_234 );
    					unset( $pos_234 );
    					break;
    				}
    			}
    			$_235 = TRUE; break;
    		}
    		while(0);
    		if( $_235 === FALSE) {
    			$result = $res_236;
    			$this->pos = $pos_236;
    			unset( $res_236 );
    			unset( $pos_236 );
    		}
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_249 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_249 = FALSE; break; }
    		if (substr($this->string ?? '',$this->pos ?? 0,1) == '>') {
    			$this->pos += 1;
    			$result["text"] .= '>';
    		}
    		else { $_249 = FALSE; break; }
    		$res_241 = $result;
    		$pos_241 = $this->pos;
    		$matcher = 'match_'.$this->expression($result, $stack, 'TemplateMatcher'); $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "Children" );
    		}
    		else {
    			$result = $res_241;
    			$this->pos = $pos_241;
    			unset( $res_241 );
    			unset( $pos_241 );
    		}
    		if (( $subres = $this->literal( '</:' ) ) !== FALSE) { $result["text"] .= $subres; }
    		else { $_249 = FALSE; break; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_249 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		if (( $subres = $this->literal( ''.$this->expression($result, $stack, 'ComponentName').'' ) ) !== FALSE) { $result["text"] .= $subres; }
    		else { $_249 = FALSE; break; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_249 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		if (substr($this->string ?? '',$this->pos ?? 0,1) == '>') {
    			$this->pos += 1;
    			$result["text"] .= '>';
    		}
    		else { $_249 = FALSE; break; }
    		$_249 = TRUE; break;
    	}
    	while(0);
    	if( $_249 === TRUE ) { return $this->finalise($result); }
    	if( $_249 === FALSE) { return FALSE; }
    }


    /* ComponentSelfClosing: '<:' N < ComponentName:Word N < (ComposedNamedArgument ( N < ComposedNamedArgument N < )*)? N > N '/>' */
    protected $match_ComponentSelfClosing_typestack = array('ComponentSelfClosing','Component');
    function match_ComponentSelfClosing ($stack = array()) {
    	$matchrule = "ComponentSelfClosing"; $result = $this->construct($matchrule, $matchrule, null);
    	$_271 = NULL;
    	do {
    		if (( $subres = $this->literal( '<:' ) ) !== FALSE) { $result["text"] .= $subres; }
    		else { $_271 = FALSE; break; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_271 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		$matcher = 'match_'.'Word'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres, "ComponentName" );
    		}
    		else { $_271 = FALSE; break; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_271 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		$res_266 = $result;
    		$pos_266 = $this->pos;
    		$_265 = NULL;
    		do {
    			$matcher = 'match_'.'ComposedNamedArgument'; $key = $matcher; $pos = $this->pos;
    			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    			if ($subres !== FALSE) {
    				$this->store( $result, $subres );
    			}
    			else { $_265 = FALSE; break; }
    			while (true) {
    				$res_264 = $result;
    				$pos_264 = $this->pos;
    				$_263 = NULL;
    				do {
    					$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    					}
    					else { $_263 = FALSE; break; }
    					if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    					$matcher = 'match_'.'ComposedNamedArgument'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    					}
    					else { $_263 = FALSE; break; }
    					$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    					if ($subres !== FALSE) {
    						$this->store( $result, $subres );
    					}
    					else { $_263 = FALSE; break; }
    					if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    					$_263 = TRUE; break;
    				}
    				while(0);
    				if( $_263 === FALSE) {
    					$result = $res_264;
    					$this->pos = $pos_264;
    					unset( $res_264 );
    					unset( $pos_264 );
    					break;
    				}
    			}
    			$_265 = TRUE; break;
    		}
    		while(0);
    		if( $_265 === FALSE) {
    			$result = $res_266;
    			$this->pos = $pos_266;
    			unset( $res_266 );
    			unset( $pos_266 );
    		}
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_271 = FALSE; break; }
    		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
    		$matcher = 'match_'.'N'; $key = $matcher; $pos = $this->pos;
    		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
    		if ($subres !== FALSE) {
    			$this->store( $result, $subres );
    		}
    		else { $_271 = FALSE; break; }
    		if (( $subres = $this->literal( '/>' ) ) !== FALSE) { $result["text"] .= $subres; }
    		else { $_271 = FALSE; break; }
    		$_271 = TRUE; break;
    	}
    	while(0);
    	if( $_271 === TRUE ) { return $this->finalise($result); }
    	if( $_271 === FALSE) { return FALSE; }
    }



    function Component__construct(&$res)
    {
        $res['arguments'] = [];
    }

    function Component_ComposedNamedArgument(&$res, $sub)
    {
        $res['arguments'][] = $sub['php'];
    }

    function Component__finalise(&$res)
    {
        $res['php'] .= Injector::inst()->get('Symbiote\\Components\\ComponentService')->generateTemplateCode($res, $this);
    }

    /* Text: (
        / [^<${\\]+ / |
        / (\\.) / |
        '<' !/ % | : | \/: / |
        '$' !(/[A-Za-z_]/) |
        '{' !'$' |
        '{$' !(/[A-Za-z_]/)
    )+ */
    protected $match_Text_typestack = array('Text');
    function match_Text ($stack = array()) {
    	$matchrule = "Text"; $result = $this->construct($matchrule, $matchrule, null);
    	$count = 0;
    	while (true) {
    		$res_311 = $result;
    		$pos_311 = $this->pos;
    		$_310 = NULL;
    		do {
    			$_308 = NULL;
    			do {
    				$res_273 = $result;
    				$pos_273 = $this->pos;
    				if (( $subres = $this->rx( '/ [^<${\\\\]+ /' ) ) !== FALSE) {
    					$result["text"] .= $subres;
    					$_308 = TRUE; break;
    				}
    				$result = $res_273;
    				$this->pos = $pos_273;
    				$_306 = NULL;
    				do {
    					$res_275 = $result;
    					$pos_275 = $this->pos;
    					if (( $subres = $this->rx( '/ (\\\\.) /' ) ) !== FALSE) {
    						$result["text"] .= $subres;
    						$_306 = TRUE; break;
    					}
    					$result = $res_275;
    					$this->pos = $pos_275;
    					$_304 = NULL;
    					do {
    						$res_277 = $result;
    						$pos_277 = $this->pos;
    						$_280 = NULL;
    						do {
    							if (substr($this->string ?? '',$this->pos ?? 0,1) == '<') {
    								$this->pos += 1;
    								$result["text"] .= '<';
    							}
    							else { $_280 = FALSE; break; }
    							$res_279 = $result;
    							$pos_279 = $this->pos;
    							if (( $subres = $this->rx( '/ % | : | \/: /' ) ) !== FALSE) {
    								$result["text"] .= $subres;
    								$result = $res_279;
    								$this->pos = $pos_279;
    								$_280 = FALSE; break;
    							}
    							else {
    								$result = $res_279;
    								$this->pos = $pos_279;
    							}
    							$_280 = TRUE; break;
    						}
    						while(0);
    						if( $_280 === TRUE ) { $_304 = TRUE; break; }
    						$result = $res_277;
    						$this->pos = $pos_277;
    						$_302 = NULL;
    						do {
    							$res_282 = $result;
    							$pos_282 = $this->pos;
    							$_287 = NULL;
    							do {
    								if (substr($this->string ?? '',$this->pos ?? 0,1) == '$') {
    									$this->pos += 1;
    									$result["text"] .= '$';
    								}
    								else { $_287 = FALSE; break; }
    								$res_286 = $result;
    								$pos_286 = $this->pos;
    								$_285 = NULL;
    								do {
    									if (( $subres = $this->rx( '/[A-Za-z_]/' ) ) !== FALSE) {
    										$result["text"] .= $subres;
    									}
    									else { $_285 = FALSE; break; }
    									$_285 = TRUE; break;
    								}
    								while(0);
    								if( $_285 === TRUE ) {
    									$result = $res_286;
    									$this->pos = $pos_286;
    									$_287 = FALSE; break;
    								}
    								if( $_285 === FALSE) {
    									$result = $res_286;
    									$this->pos = $pos_286;
    								}
    								$_287 = TRUE; break;
    							}
    							while(0);
    							if( $_287 === TRUE ) { $_302 = TRUE; break; }
    							$result = $res_282;
    							$this->pos = $pos_282;
    							$_300 = NULL;
    							do {
    								$res_289 = $result;
    								$pos_289 = $this->pos;
    								$_292 = NULL;
    								do {
    									if (substr($this->string ?? '',$this->pos ?? 0,1) == '{') {
    										$this->pos += 1;
    										$result["text"] .= '{';
    									}
    									else { $_292 = FALSE; break; }
    									$res_291 = $result;
    									$pos_291 = $this->pos;
    									if (substr($this->string ?? '',$this->pos ?? 0,1) == '$') {
    										$this->pos += 1;
    										$result["text"] .= '$';
    										$result = $res_291;
    										$this->pos = $pos_291;
    										$_292 = FALSE; break;
    									}
    									else {
    										$result = $res_291;
    										$this->pos = $pos_291;
    									}
    									$_292 = TRUE; break;
    								}
    								while(0);
    								if( $_292 === TRUE ) { $_300 = TRUE; break; }
    								$result = $res_289;
    								$this->pos = $pos_289;
    								$_298 = NULL;
    								do {
    									if (( $subres = $this->literal( '{$' ) ) !== FALSE) {
    										$result["text"] .= $subres;
    									}
    									else { $_298 = FALSE; break; }
    									$res_297 = $result;
    									$pos_297 = $this->pos;
    									$_296 = NULL;
    									do {
    										if (( $subres = $this->rx( '/[A-Za-z_]/' ) ) !== FALSE) {
    											$result["text"] .= $subres;
    										}
    										else { $_296 = FALSE; break; }
    										$_296 = TRUE; break;
    									}
    									while(0);
    									if( $_296 === TRUE ) {
    										$result = $res_297;
    										$this->pos = $pos_297;
    										$_298 = FALSE; break;
    									}
    									if( $_296 === FALSE) {
    										$result = $res_297;
    										$this->pos = $pos_297;
    									}
    									$_298 = TRUE; break;
    								}
    								while(0);
    								if( $_298 === TRUE ) { $_300 = TRUE; break; }
    								$result = $res_289;
    								$this->pos = $pos_289;
    								$_300 = FALSE; break;
    							}
    							while(0);
    							if( $_300 === TRUE ) { $_302 = TRUE; break; }
    							$result = $res_282;
    							$this->pos = $pos_282;
    							$_302 = FALSE; break;
    						}
    						while(0);
    						if( $_302 === TRUE ) { $_304 = TRUE; break; }
    						$result = $res_277;
    						$this->pos = $pos_277;
    						$_304 = FALSE; break;
    					}
    					while(0);
    					if( $_304 === TRUE ) { $_306 = TRUE; break; }
    					$result = $res_275;
    					$this->pos = $pos_275;
    					$_306 = FALSE; break;
    				}
    				while(0);
    				if( $_306 === TRUE ) { $_308 = TRUE; break; }
    				$result = $res_273;
    				$this->pos = $pos_273;
    				$_308 = FALSE; break;
    			}
    			while(0);
    			if( $_308 === FALSE) { $_310 = FALSE; break; }
    			$_310 = TRUE; break;
    		}
    		while(0);
    		if( $_310 === FALSE) {
    			$result = $res_311;
    			$this->pos = $pos_311;
    			unset( $res_311 );
    			unset( $pos_311 );
    			break;
    		}
    		$count += 1;
    	}
    	if ($count > 0) { return $this->finalise($result); }
    	else { return FALSE; }
    }



}
