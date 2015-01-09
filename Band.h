//
//  Band.h
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <Foundation/Foundation.h>
#import <Parse/Parse.h>
#import "FileManager.h"
#import "Song.h"
@interface Band : NSObject

- (id) initWithPFObject:(PFObject *)pfObject;
- (NSString *) bandID;
-(PFObject *)getPFObject;
@property (nonatomic, strong) NSMutableDictionary *dataFile;
@property (strong, nonatomic) NSMutableArray *songList;
@property (strong, nonatomic) PFObject *pfobject;


@end
