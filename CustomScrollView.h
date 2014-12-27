//
//  CustomScrollView.h
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface CustomScrollView : UIScrollView
-(void) addItem:(UIView *)view;
-(void) setResizeable:(BOOL)resizable;
@property BOOL sizeable;
@end
