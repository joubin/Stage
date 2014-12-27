//
//  BandsInArea.m
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "BandsInArea.h"

@implementation BandsInArea

+ (id)sharedManager {
    static BandsInArea *sharedBandsInArea = nil;
    static dispatch_once_t onceToken;
    dispatch_once(&onceToken, ^{
        sharedBandsInArea = [[self alloc] init];
    });
    return sharedBandsInArea;
}

- (id)init {
    if (self = [super init]) {
        self.allBandsCollection = [[NSMutableDictionary alloc] init];
    }
    return self;
}

@end
