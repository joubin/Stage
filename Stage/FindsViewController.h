//
//  FindsViewController.h
//  Stage
//
//  Created by Joubin Jabbari on 12/27/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "BandDetailedViewController.h"
#import "LocationManager.h"
#import <Parse/Parse.h>
#import "Band.h"

@interface FindsViewController : UIViewController <UITableViewDataSource, UITableViewDelegate>
@property (nonatomic, strong) UITableView *tbl;
@property (nonatomic, strong) NSMutableDictionary *tableData;
@property (nonatomic, strong) UIRefreshControl *refreshControl;

@end
