//
//  LocationManager.m
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "LocationManager.h"

@implementation LocationManager{
    CLLocationManager *locationManager;
}
+ (id)sharedManager {
    static LocationManager *instance = nil;
    static dispatch_once_t onceToken;
    dispatch_once(&onceToken, ^{
        instance = [[self alloc] init];
    });
    return instance;
}

- (id)init {
    if (self = [super init]) {
        locationManager = [[CLLocationManager alloc] init];
        locationManager.delegate = self;
        locationManager.distanceFilter = kCLDistanceFilterNone; // whenever we move
        locationManager.desiredAccuracy = kCLLocationAccuracyBestForNavigation; // 100 m
        locationManager.headingFilter = 1;
        
        [locationManager startUpdatingLocation];
        [locationManager requestAlwaysAuthorization];


    }
    return self;
}


- (NSString *) getLatitude{
    return [NSString stringWithFormat:@"%f", locationManager.location.coordinate.latitude];
}
- (NSString *) getLongitude{
    return [NSString stringWithFormat:@"%f", locationManager.location.coordinate.longitude];

}



@end
