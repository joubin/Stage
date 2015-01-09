//
//  Favorits.h
//  Stage
//
//  Created by Joubin Jabbari on 12/27/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <AVFoundation/AVFoundation.h>

@interface Favorits : UIViewController <UITableViewDataSource, UITableViewDelegate, AVAudioPlayerDelegate>
@property (nonatomic, strong) UITableView *tbl;
@property (nonatomic, strong) NSMutableDictionary *tableData;
@property (nonatomic, strong) UIRefreshControl *refreshControl;
@property (nonatomic, strong) IBOutlet UISlider *seekbar;

@end
