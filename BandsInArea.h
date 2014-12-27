//
//  BandsInArea.h
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface BandsInArea : NSObject
@property (nonatomic, retain) NSMutableDictionary *allBandsCollection;

+ (id)sharedManager;
@end
