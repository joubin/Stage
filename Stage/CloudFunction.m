//
//  CloudFunction.m
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "CloudFunction.h"
#import "LocationManager.h"
@implementation CloudFunction{
    LocationManager *lm;
}
- (instancetype)init
{
    self = [super init];
    if (self) {
        lm = [LocationManager sharedManager];
    }
    return self;
}
-(void) callHelloWorld {
    [PFCloud callFunctionInBackground:@"isInVenue"
                       withParameters:@{@"lat": [lm getLatitude], @"lon": [lm getLongitude]}
                                block:^(NSArray *results, NSError *error) {
                                    if (!error) {
                                        NSLog(@"being called %@", results);
                                        
                                    }
                                }];}

-(void) takeResults{
    NSLog(@"being called");
}
@end
