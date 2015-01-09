//
//  BandDetailedViewController.h
//  Stage
//
//  Created by Joubin Jabbari on 12/23/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "CustomScrollView.h"
#import <Parse/Parse.h>
#import "Band.h"
#import "CloudFunction.h"
#import <Social/Social.h>
#import "SocialButtons.h"

@interface BandDetailedViewController : UIViewController <UIScrollViewDelegate>
- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil withData:(NSObject *)dt;
- (id)initWithData:(Band *)dt;

@property (nonatomic, strong) PFObject *data;
@end
