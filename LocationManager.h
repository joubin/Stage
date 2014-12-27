//
//  LocationManager.h
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <Foundation/Foundation.h>
#import <CoreLocation/CoreLocation.h>
#import <CoreMotion/CoreMotion.h>

@interface LocationManager : NSObject <CLLocationManagerDelegate>
+ (id)sharedManager;
- (NSString *) getLatitude;
- (NSString *) getLongitude;
@end
